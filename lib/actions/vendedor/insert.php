<?php
session_start();

include("../../connection.php");

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$telefone = $_POST["telefone"];
$porc_comissao = $_POST["porc_comissao"];

$sql = "INSERT INTO vendedor (nome, endereco, cidade, estado, telefone, porc_comissao) VALUES (
    '$nome',
    '$endereco',
    '$cidade',
    '$estado',
    '$telefone',
    $porc_comissao
);";

$result = mysqli_query($conn, $sql);

if (mysqli_insert_id($conn)) {
    $_SESSION["resul"] = "Sucesso no cadastro do vendedor";
} else {
    $_SESSION["resul"] = "Erro ao cadastrar vendedor";
}

header("Location: ../../../cadastrar_vendedor.php", true);