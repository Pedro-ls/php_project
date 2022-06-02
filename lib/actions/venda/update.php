<?php
session_start();

include("../../connection.php");

$numero = $_POST["id"];
$data = $_POST["data"];
$prazo_entrega = $_POST["prazo"];
$cond_pagto = $_POST["cond"];
$fk_cliente_codigo = $_POST["cliente"];
$fk_vendedor_cod = $_POST["vendedor"];

$sql = "UPDATE vendas SET
    data = '$data',
    prazo_entrega = '$prazo_entrega',
    cond_pagto = '$cond_pagto',
    fk_cliente_codigo = $fk_cliente_codigo,
    fk_vendedor_cod = $fk_vendedor_cod
WHERE numero = $numero;";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION["resul"] = "Sucesso na alteração do vendedor";
    header("Location: ../../../listar_vendas.php", true);
} else {
    $_SESSION["resul"] = "Erro na alteração vendedor";
    header("Location: ../../../listar_vendas.php", true);
}