<?php 
    // COMO FORÇAR OS STRICT TYPES?

    declare(strict_types = 1);

    function multiplicar($a, $b): int|float {
        return $a * $b;
    }

    echo multiplicar(10.3, 2);
?>