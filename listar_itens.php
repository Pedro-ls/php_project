<?php
include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM itens_vendas_produto
WHERE id_venda = $id";

$resul = mysqli_query($conn, $sql);


// print_r(mysqli_fetch_assoc($resul));
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar itens</title>
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
    <div class="container">
        <div class=" mb-5">
            <h1 class="h1 text-center">Itens da Venda</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        ID Venda
                    </th>
                    <th>
                        Produto
                    </th>
                    <th>
                        quantidade do item
                    </th>
                    <th>
                        Preço
                    </th>
                    <th>
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php

                $soma = 0;

                while ($row = mysqli_fetch_array($resul)) {
                    $total_item = $row["iv_qtd"] * $row["p_preco"];
                    $soma =  ($total_item) + $soma;
                ?>
                    <tr>
                        <td><?php echo $row["id_venda"]; ?></td>
                        <td><?php echo $row["p_nome"]; ?></td>
                        <td><?php echo $row["iv_qtd"]; ?></td>
                        <td><?php echo $row["p_preco"];  ?></td>
                        <td><?php echo $total_item;  ?></td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div>
            <p>Total da Venda: <?php echo $soma; ?></p>
        </div>

    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>