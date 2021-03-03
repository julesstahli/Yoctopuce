<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function all(Request $request){
        $this->validate($request, [
            'fromID' => 'nullable|numeric',
            'limit' => 'nullable|numeric',
            'offset' => 'nullable|numeric',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'pression' => 'nullable|boolean',
            'humidity' => 'nullable|boolean',
            'brightness' => 'nullable|boolean',
            'order' => ['nullable', 'regex:/^(desc)|(asc)$/i']
        ]);
        $query = History::orderBy("date", ($request->has('order') &&  $request->input('order') == 'desc') ? 'asc' : 'desc');
        if ($request->has('fromID')) {
            $query = $query->where('id', '>', $request->input('fromID'));
       }
        if ($request->has('limit')) {
             $query = $query->limit($request->input('limit'));
        }
        if ($request->has('offset')) {
            $query = $query->offset($request->input('offset'));
        }
        if ($request->has('from')) {
            $query = $query->whereDate('date', '>', $request->input('from'));
        }
        if ($request->has('to')) {
            $query = $query->whereDate('date', '<', $request->input('to'));
        }
        if ($request->has('pression') || $request->has('humidity') || $request->has('brightness')) {
            $pression = $request->input('pression');
            $humidity = $request->input('humidity');
            $brightness = $request->input('brightness');
            $exluded = [];
            if ($pression !== null && $pression == '0') {
                $exluded[] = 'pression';
            }
            if ($humidity !== null && $humidity == '0') {
                $exluded[] = 'humidity';
            }
            if ($brightness !== null && $brightness == '0') {
                $exluded[] = 'brightness';
            }
            $query = $query->exclude($exluded);
        }
        return $query->get();
    }

    public function last(){
        return History::orderBy("date", "desc")->first();
    }
}
