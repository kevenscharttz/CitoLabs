<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Season;

class SeasonsController extends Controller
{
    public function index(int $series)
    {
        $seriesModel = Series::findOrFail($series);

        $seasons = $seriesModel->seasons()->with('episodes')->get();
        return view('seasons.index')
            ->with('seasons', $seasons)
            ->with('series', $seriesModel);
    }
}
