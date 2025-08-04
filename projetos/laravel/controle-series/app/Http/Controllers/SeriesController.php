<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys',
        ];

        return view('series.index')
            ->with('series', $series);
    }
}
