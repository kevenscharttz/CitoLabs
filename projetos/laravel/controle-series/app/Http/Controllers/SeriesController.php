<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;


class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        return view('series.index')
            ->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->only(['nome', 'sinopse']);
        Serie::create($nomeSerie);

       return to_route('series.index');
        
    }

    public function destroy(Request $request)
    {

        Serie::destroy($request->series);

        return to_route('series.index');
    }
}
