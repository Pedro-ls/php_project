<?php
session_start();
include("../../connection.php");

$id = $_POST["id"];

$sql = "DELETE FROM produtos WHERE cod = $id;";

$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION["resul"] = "Sucesso na deleção";
    header("Location: ../../../listar_produtos.php", true);
} else {
    $_SESSION["resul"] = "Erro na deleção";
    header("Location: ../../../listar_produtos.php", true);
}