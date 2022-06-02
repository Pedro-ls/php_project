<?php
session_start();
include("../../connection.php");

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$limite_cred = $_POST["limite_cred"];
$cidade = $_POST["cidade"];
$email = $_POST["email"];
$CPF = $_POST["CPF"];
$estado = $_POST["estado"];

$sql = "INSERT INTO cliente (nome,
endereco,
telefone,
limite_cred,
cidade,
email,
CPF,
estado) VALUES (
    '$nome',
    '$endereco',
    '$telefone',
    '$limite_cred',
    '$cidade',
    '$email',
    '$CPF',
    '$estado'
);";

$result = mysqli_query($conn, $sql);

if (mysqli_insert_id($conn)) {
    $_SESSION["resul"] = "Sucesso no cadastao do cliente.";
    header("Location: ../../../cadastrar_cliente.php");
} else {
    $_SESSION["resul"] = "Erro no cadastao do cliente.";
    header("Location: ../../../cadastrar_cliente.php");
}
