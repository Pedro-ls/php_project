<?php
session_start();
include_once("lib/connection.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM categoria WHERE id = '$id'";
$resultado = mysqli_query($conn, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Alteração Categoria</title>
</head>

<body>
    <h1>Alteração - Categoria</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>
    <form method="POST" action="lib/actions/categoria/update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" ; <p><label>Categoria: </label><input type="text" name="descricao" size="35" value="<?php echo $row['descricao']; ?>">
        <?php
        mysqli_close($conn);
        ?>
        <p><input type="submit" value="Salvar"></p>
    </form>
</body>

</html>