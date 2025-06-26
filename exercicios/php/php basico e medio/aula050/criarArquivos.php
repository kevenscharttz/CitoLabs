<?php 
    $path = __DIR__;

    for ($i = 1; $i <= 5; $i++){
        file_put_contents("index$i.php", '');
    }
?>