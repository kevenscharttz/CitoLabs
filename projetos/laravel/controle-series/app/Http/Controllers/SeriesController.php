<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(): void
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys',
        ];

        $html = '<ul>';

        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        echo $html .= '</lu>';
    }
}
