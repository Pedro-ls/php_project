<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../connection.php");

$data = $_POST["data"];
$prazo_entrega = $_POST["prazo"];
$cond_pagto = $_POST["cond"];
$fk_cliente_codigo = $_POST["cliente"];
$fk_vendedor_cod = $_POST["vendedor"];

mysqli_begin_transaction($conn) or die(mysqli_connect_error());

try {
    $sql = "INSERT INTO vendas (data, prazo_entrega, cond_pagto, fk_cliente_codigo, fk_vendedor_cod) VALUES ('$data', '$prazo_entrega', '$cond_pagto', $fk_cliente_codigo, $fk_vendedor_cod);";

    $result = mysqli_query($conn, $sql);
    $venda_id = mysqli_insert_id($conn);

    foreach ($_SESSION["itens"] as $item) {
        $produto_id = $item["id"];
        $qtd_venda = $item["qtd"];
        $sql_item_venda = "INSERT INTO itens_vendas (
                            fk_produtos_cod, fk_vendas_numero, quant_vendida
                        ) VALUES (
                            $produto_id, $venda_id, $qtd_venda
                        );
                      ";
        mysqli_query($conn, $sql_item_venda);
    }
    unset($_SESSION["itens"]);

    mysqli_commit($conn);
    mysqli_close($conn);
    $_SESSION["resul"] = "Sucesso no cadastro da Venda";
    header("Location: ../../../cadastrar_venda.php", true);
} catch (mysqli_sql_exception $ex) {

    mysqli_rollback($conn);
    $_SESSION["resul"] = "Erro ao cadastrar Venda";
    mysqli_close($conn);
    header("Location: ../../../cadastrar_venda.php", true);
}
