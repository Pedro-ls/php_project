<?php
$HOST = "localhost";
$USER = "root";
$PASSWORD = "";
$DB = "venda";

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

if (!$conn) {
    print("Erro na conexão com Mysql");
    print("Erro" . mysqli_connect_error());
    exit;
}