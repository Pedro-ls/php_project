<?php
session_start();

include("../../connection.php");

$id = $_POST["id"];

$sql = "DELETE FROM vendedor WHERE cod = $id;";

$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION["resul"] = "Sucesso na alteração";
    header("Location: ../../../listar_vendedor.php", true);
} else {
    $_SESSION["resul"] = "Erro na alteração";
    header("Location: ../../../editar_vendedor.php", true);
}