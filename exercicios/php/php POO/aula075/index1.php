<?php
    // PROPRIEDADES ESTÁTICAS

    /*
    À semelhança dos métodos, as classes também podem ter propriedades estáticas.
    Essas propriedades podem ser chamadas diretamente sem que seja ncessário criar
    uma instância da classe.
    */

    class Matematica {
        public static $pi = 3.14;
    }

    //Para chamar a propriedades, usamos ::

    echo "O resultado é: " . Matematica::$pi * 10;
?>