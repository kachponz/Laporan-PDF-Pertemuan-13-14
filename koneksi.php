<?php

$server = "sql305.byethost24.com";
$user = "b24_32977667";
$password = "000webhostampas";
$nama_database = "b24_32977667_tutorial";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>