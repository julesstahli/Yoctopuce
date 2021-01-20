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
        return Measure::orderBy("created_at", "desc")->get();
    }

    public function last(){
        return Measure::orderBy("created_at", "desc")->first();
    }
}
