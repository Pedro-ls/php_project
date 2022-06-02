<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$descricao = $_POST["descricao"];

include('../../connection.php');

$query = "INSERT INTO categoria (descricao) VALUES ('$descricao')";
$resu = mysqli_query($conn, $query);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:blue;'> Categoria cadastrado com sucesso!</p>";
    header("Location: ../../../cadastrar_categoria.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Categoria não foi cadastrada!</p>";
    header("Location: ../../../cadastrar_categoria.php");
}
mysqli_close($conn);
