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
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container-fluid">
            <h1 class="navbar-brand text-light">Pagina Inicial</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Opções">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <a class="nav-link btn btn-primary active text-light" href="./listar_clientes.php">Listar
                        Clientes</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_produtos.php">Listar Produtos</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_vendas.php">Listar Venda</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_vendedor.php">Listar Vendedor</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_categoria.php">Listar Categoria</a>
                </div>
            </div>
        </div>
    </nav>
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
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>