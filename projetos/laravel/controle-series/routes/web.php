<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});


Route::controller(Seriescontroller::class)->group(function(){
    Route::get('/series', ['index']);

    Route::get('/series/criar', ['create']);

    Route::post('/series/salvar', ['store']);
});
