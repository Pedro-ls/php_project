<?php
session_start();
$id = $_POST['id'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include('../../connection.php');
mysqli_begin_transaction($conn) or die(mysqli_connect_error());
try {
    $query_cli = "DELETE FROM categoria WHERE id =$id;";
    $resu = mysqli_query($conn, $query_cli);
    mysqli_commit($conn);
    $_SESSION['msg'] = "<p style='color:green;'>Categoria excluída com sucesso!</p>";
    header("Location: ../../../listar_categoria.php");
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);

    throw $exception;
    $_SESSION['msg'] = "<p style='color:red;'>Categoria não foi excluida, verifique!</p>";
    header("Location: ../../../listar_categoria.php");
}
mysqli_close($conn);
