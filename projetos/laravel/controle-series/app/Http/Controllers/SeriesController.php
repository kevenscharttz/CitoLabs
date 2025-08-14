<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;


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
        $series = Series::create($request->all());

        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++){
            $seasons[] = [
                'series_id' => $series->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        

        $episodes = [];
        foreach ($series->seasons as $season){
            
            for ($j = 1; $j <= $request->episodesQty; $j++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }
        Episode::insert($episodes);
    

        $request->session()->flash('mensagem.sucesso', "{$series -> nome} adiciona com sucesso");
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
