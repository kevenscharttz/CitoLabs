

    //Arrays multidimensionais
    //são arrays que contem outros arrays

    $lojas = [
        'porto' => [
            'telefone'=> '12345',
            'email'=> 'porto@gmail.com',
        ],
        'lisboa'=> [
            'telefone'=> '23456',
            'email'=> 'lisboa@gmail.com',
        ],
        'Coimbra'=> [
            'telefone'=> '34567',
            'email'=> 'coimbra@gmail.com',
        ]
        ];

        echo "<pre>";
        print_r($lojas);
        echo "</pre>";

        //Apresentar um valor especifico

        echo $lojas ['lisboa']['email'];

        //nos arrays com indices númericos, também podemos ter multidimensão

        $notas = [
            [10, 20, 30],
            [100, 200, 300],
            [1000, 2000, 3000]
        ];

        echo "<pre>";
        print_r($notas);
        echo "</pre>";

        echo $notas [2][0];
?>