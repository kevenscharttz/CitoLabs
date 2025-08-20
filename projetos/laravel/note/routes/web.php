<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/sobre', function () {
   echo 'É sobre isso e tá tudo bem';
});

Route::get('/main/{value}',[MainController::class, 'index']);
