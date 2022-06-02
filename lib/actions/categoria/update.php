<?php
session_start();
include('../../connection.php');
$id = $_POST['id'];
$descricao = $_POST['descricao'];

$result = "UPDATE categoria SET descricao='$descricao' WHERE id='$id'";
$resultado = mysqli_query($conn, $result) or die(mysqli_connect_error());

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'>Categoria alterada com sucesso!</p>";
    header("Location: ../../../listar_categoria.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Categoria não foi alterada, verifique </p>";
    header("Location: ../../../listar_categoria.php");
}
mysqli_close($conn);
