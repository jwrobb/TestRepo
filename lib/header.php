<?php

//Common variables

$urlPath = "/noel_interactive/insideedge/";

$db_user = "robbins_noelint";
$db_pass = "n03l1nt";
$db_host = "localhost";
$db_database = "robbins_clients";

//Connect to the db
$dbObj = new mysqli($db_host, $db_user, $db_pass, $db_database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Common functions

function array2csv(array &$array)
{
   if (count($array) == 0) return null;
   
   ob_start();
   $df = fopen("php://output", 'w');   
   
   fputcsv($df, array_keys(reset($array)));

   foreach ($array as $row) {    
      fputcsv($df, $row);
   }
   
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

?>
