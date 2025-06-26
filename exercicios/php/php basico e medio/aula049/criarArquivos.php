<?php 
    $path = __DIR__;

    if (!file_exists('outros')){
        mkdir($path.'/outros');
    }

    file_put_contents($path.'/outros/script3.php', '');
?>