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
        $request->validate([
            'nome' => ['required', 'min:3']
        ]);
        $nomeSerie = Serie::create($request->all());

        $request->session()->flash('mensagem.sucesso', "{$nomeSerie -> nome} adiciona com sucesso");
        return to_route('series.index');
        
    }

    public function destroy(Serie $series, Request $request)
    {

        $series->delete();
        return to_route('series.index')
        ->with('mensagem.sucesso', "{$series -> nome} removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Serie $series, Request $request)
    {   
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
        ->with('mensagem.sucesso', "{$series -> nome} atualizada com sucesso");
    }
}
