<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measure;

class MeasuresController extends Controller
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
            'limit' => 'nullable|numeric',
            'offset' => 'nullable|numeric',
            'from' => 'nullable|date',
            'to' => 'nullable|date'
        ]);
        $query = Measure::orderBy("created_at", "desc");
        if ($request->has('limit')) {
             $query = $query->limit($request->input('limit'));
        }
        if ($request->has('offset')) {
            $query = $query->offset($request->input('offset'));
        }
        if ($request->has('from')) {
            $query = $query->whereDate('created_at', '>', $request->input('from'));
        }
        if ($request->has('to')) {
            $query = $query->whereDate('created_at', '<', $request->input('to'));
        }
        return $query->get();
    }

    public function last(){
        return Measure::orderBy("created_at", "desc")->first();
    }
}
