<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$qtd_estoque = $_POST["qtd_estoque"];
$unidade_medida = $_POST["unidade_medida"];
$categoria = $_POST["categoria"];

include('../../connection.php');

$query = "INSERT INTO produtos ( nome, preco, qtd_estoque, unidade_medida, fk_categoria_id) VALUES ('$nome', $preco, '$qtd_estoque', '$unidade_medida');";
$resu = mysqli_query($conn, $query);


if (mysqli_insert_id($conn)) {
    $SESSION['msg'] = "<p style='color:blue,'> Produto cadastrado com sucesso!</p>";
    header('Location: ../../../cadastrar_produto.php');
} else {
    $SESSION['msg'] = "<p style='color:red,'> Produto não foi cadastrado!</p>";
    header('Location: ../../../cadastrar_produto.php');
    mysqli_close($conn);
}