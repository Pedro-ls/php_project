<?php
session_start();

unset($_SESSION["resul"]);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../connection.php");

$id = $_POST["id"];

mysqli_begin_transaction($conn) or die(mysqli_connect_error());

try {
    $sql_venda = "DELETE FROM vendas WHERE numero = $id;";
    $sql_item = "DELETE FROM itens_vendas WHERE fk_vendas_numero = $id;";

    mysqli_query($conn, $sql_item);
    mysqli_query($conn, $sql_venda);

    mysqli_commit($conn);
    mysqli_close($conn);

    $_SESSION["resul"] = "Sucesso na Exclusão";
    header("Location: ../../../listar_vendas.php", true);
} catch (mysqli_sql_exception $ex) {
    mysqli_rollback($conn);
    mysqli_close($conn);
    $_SESSION["resul"] = "Erro na Exclusão";
    header("Location: ../../../listar_vendas.php", true);
}