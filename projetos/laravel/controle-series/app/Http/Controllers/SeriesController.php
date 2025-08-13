<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Series;


class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::with('seasons')
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

    public function store(SeriesFormRequest $request)
    {
        $nomeSerie = Series::create($request->all());
        $request->session()->flash('mensagem.sucesso', "{$nomeSerie -> nome} adiciona com sucesso");
        return to_route('series.index');
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')
        ->with('mensagem.sucesso', "{$series -> nome} removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {   
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')
        ->with('mensagem.sucesso', "{$series -> nome} atualizada com sucesso");
    }
}