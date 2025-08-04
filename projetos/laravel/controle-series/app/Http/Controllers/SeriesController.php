<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'Grey\'s Anatomy',
            'The boys',
        ];

        return view('series.index')
            ->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }
}
