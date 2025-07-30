<?php

namespace app\Http\Controllers;

class SeriesController
{

    public function listarSeries(): void
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
