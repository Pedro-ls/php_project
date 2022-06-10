<?php
session_start();
include('lib/connection.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM produtos WHERE cod = $id;";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Excluir Categoria</title>
</head>

<body>
    <h1 class="h1">Excluir Categoria</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <section>
        <p>
            <?php echo $row["nome"]; ?>
        </p>
        <p>
            <?php echo $row["preco"]; ?>
        </p>
    </section>
    <?php if (!empty($row)) { ?>
    <form method="POST" action="lib/actions/produto/delete.php">
        <input type="hidden" name="id" value="<?php echo $row["cod"]; ?>">

        <p><button class="btn btn-danger" type="submit">Confirma exclusão</button></p>
    </form>
    <?php } ?>
    <?php mysqli_close($conn); ?>
</body>

</html>