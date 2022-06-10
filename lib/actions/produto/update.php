<?php
session_start();
include("../../connection.php");
$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$qtd = $_POST["qtd_estoque"];
$unid = $_POST["unidade_medida"];
$categoria = $_POST["categoria"];

$sql = "UPDATE produtos SET nome='$nome', preco=$preco, qtd_estoque=$qtd, unidade_medida='$unid', fk_categoria_id=$categoria WHERE cod=$id;";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION["resul"] = "Sucesso na alteração do Cliente";
    header("Location: ../../../listar_produtos.php", true);
} else {
    $_SESSION["resul"] = "Erro na alteração Cliente";
    header("Location: ../../../listar_produtos.php", true);
}