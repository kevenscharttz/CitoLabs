<?php 
    $path = __DIR__;
    $quant = 4;

    for ($i = 1; $i <= $quant; $i++){
        file_put_contents($path."/index$i.php", '<?php?>');
    }
?>