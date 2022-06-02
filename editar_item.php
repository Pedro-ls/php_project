<?php
session_start();
include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql_produtos = "SELECT * FROM produtos;";
$result_produtos = mysqli_query($conn, $sql_produtos);

$item =  $_SESSION["itens"][$id];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item</title>
</head>

<body>
    <form action="lib/actions/item_venda/alter_item.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <select name="item" id="item" required>
            <?php while ($row = mysqli_fetch_array($result_produtos)) { ?>

            <?php
                if ($item == $row["cod"]) {
                ?>
            <option value="<?php echo $row["cod"]; ?>" selected><?php echo $row["nome"]; ?></option>
            <?php
                } else {
                ?>
            <option value="<?php echo $row["cod"]; ?>"><?php echo $row["nome"]; ?></option>

            <?php }
                ?>
            <?php }
            ?>
        </select>
        <input type="number" name="qtd" required value="<?php echo $_SESSION["itens"][$id]["qtd"]; ?>">
        <button type="submit">Alterar Item</button>
    </form>
</body>

</html>