<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index($value)
    {
        return view('main', ['value' => $value]);

        //return view('main')
        //    ->with('value', $value);
    }

    function page1($value){
        return view ('page1', ['value' => $value]);
    }

    function page2($value){
        return view ('page2', ['value' => $value]);
    }
}
