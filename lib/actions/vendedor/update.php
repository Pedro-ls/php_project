<?php
session_start();

include("../../connection.php");

$id = $_POST["id"];

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$telefone = $_POST["telefone"];
$porc_comissao = $_POST["porc_comissao"];

$sql = "UPDATE vendedor SET
   nome = '$nome',
   endereco = '$endereco',
   cidade = '$cidade',
   estado = '$estado',
   telefone = '$telefone',
   porc_comissao = $porc_comissao WHERE cod =  $id;";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION["resul"] = "Sucesso no cadastro do vendedor";
} else {
    $_SESSION["resul"] = "Erro ao cadastrar vendedor";
}

header("Location: ../../../listar_vendedor.php", true);