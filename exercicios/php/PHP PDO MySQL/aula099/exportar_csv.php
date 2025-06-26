<?php
    use sys4soft\Database;

    require_once('./header.php');
    require_once('./config.php');
    require_once('./libraries/Database.php');

    $database = new Database(MYSQL_CONFIG);

    $results = $database->execute_query("SELECT * FROM contactos");

    $rows = $results->results;

    $filename = "contactos_".time().".csv";
    $file = fopen($filename, 'w');

    $headers = [];
    foreach($rows[0] as $key => $value) {
        $headers[] = $key;
    }
    fputcsv($file, $headers);

    $tmp = [];
    foreach($rows as $row) {
        $obj = (array)$row;
        fputcsv($file, $obj);
    }

    fclose($file);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    readfile($filename);
?>