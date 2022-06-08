<?php
session_start();
include("../../connection.php");

$id = $_POST["id"];

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$limite_credito = $_POST["limite_cred"];
$cidade = $_POST["cidade"];
$email = $_POST["email"];
$CPF = $_POST["CPF"];
$estado = $_POST["estado"];


$sql = "UPDATE venda SET  
nome = '$nome',
endereco = '$endereco',  
telefone  = '$telefone',
limite_cred = '$limite_credito',
cidade = '$cidade',
email  = '$email',
CPF = '$CPF',
estado = '$estado' WHERE codigo = $id;";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION["resul"] = "Sucesso na alteração do Cliente";
    header("Location: ../../../listar_clientes.php", true);
} else {
    $_SESSION["resul"] = "Erro na alteração Cliente";
    header("Location: ../../../listar_clientes.php", true);
}
