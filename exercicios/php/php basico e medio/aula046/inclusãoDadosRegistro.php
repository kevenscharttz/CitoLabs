<?php 
for ($i = 1; $i <= 20; $i++){
    file_put_contents("dados.txt","registro $i". PHP_EOL, FILE_APPEND);
}
?>