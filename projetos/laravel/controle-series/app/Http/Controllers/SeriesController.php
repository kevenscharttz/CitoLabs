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

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);

        
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        
        $nomeSerie = Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', "{$nomeSerie -> nome} adiciona com sucesso");
        return to_route('series.index');
        
    }

public function destroy(Serie $series, Request $request)
{

    $series->delete();
    $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso');

    return to_route('series.index');
}
}
