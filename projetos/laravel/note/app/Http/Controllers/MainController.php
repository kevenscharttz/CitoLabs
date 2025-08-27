<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        echo "I'm inside the app !";
    }

    function newNote()
    {
        echo "I'm creating a new note";
    }
}
