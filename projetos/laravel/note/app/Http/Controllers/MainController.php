<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        // load user's notes

        //show home view

        return view('home');
    }

    function newNote()
    {
        echo "I'm creating a new note";
    }
}
