<?php
session_start();
include('lib/connection.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM cliente WHERE codigo = $id;";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Excluir Cliente <?php echo $row["nome"]; ?></title>
</head>

<body>

    <h1 class="h1">Excluir Cliente <?php echo $row["nome"]; ?></h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <?php if (!empty($row)) { ?>
    <form method="POST" action="lib/actions/cliente/delete.php">
        <input type="hidden" name="id" value="<?php echo $row["codigo"]; ?>">

        <p><button class="btn btn-danger" type="submit">Confirma exclusão</button></p>
    </form>
    <?php } ?>
    <?php mysqli_close($conn); ?>
</body>

</html>