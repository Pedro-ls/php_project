<?php
session_start();

include("lib/connection.php");

$sql_vendedor = "SELECT * FROM vendedor;";
$result_vendedor = mysqli_query($conn, $sql_vendedor);

$sql_cliente = "SELECT * FROM cliente;";
$result_cliente = mysqli_query($conn, $sql_cliente);

$sql_produtos = "SELECT * FROM produtos;";
$result_produtos = mysqli_query($conn, $sql_produtos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar venda</title>
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
        <form class="form-control" action="lib/actions/venda/insert.php" method="POST">

            <div>
                <div>
                    <div><label for="data">Data</label></div>
                    <div><input class="form-control" type="date" name="data" id="data" required></div>
                </div>
                <div>
                    <div><label for="prazo">Prazo de Entrega</label></div>
                    <div><input class="form-control" type="text" name="prazo" id="prazo" required></div>
                </div>
                <div>
                    <div><label for="cond">Condição de Pagamento</label></div>
                    <div><input class="form-control" type="text" name="cond" id="cond" required></div>
                </div>
                <div>
                    <label for="vendedor">
                        Vendedores
                    </label>
                </div>
                <div>

                    <select class="form-control" name="vendedor" id="vendedor" required>
                        <?php while ($row = mysqli_fetch_array($result_vendedor)) { ?>

                            <option value="<?php echo $row["cod"]; ?>"><?php echo $row["nome"]; ?></option>

                        <?php } ?>
                    </select>

                </div>
                <div>
                    <label for="cliente">
                        Clientes
                    </label>
                </div>
                <div>
                    <select class="form-control" name="cliente" id="cliente" required>
                        <?php while ($row = mysqli_fetch_array($result_cliente)) { ?>

                            <option value="<?php echo $row["codigo"]; ?>"><?php echo $row["nome"]; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div>
                <button class="btn btn-success my-2" type="submit">Incluir Venda</button>
            </div>
        </form>
        <form class="form-control my-2" action="lib/actions/item_venda/add_item.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="item">item</label>
                    <select class="form-control" name="item" id="item" required>
                        <?php while ($row = mysqli_fetch_array($result_produtos)) { ?>

                            <option value="<?php echo $row["cod"]; ?>"><?php echo $row["nome"]; ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="qtd">Quantidade</label>
                    <input class="form-control" type="number" name="qtd" id="qtd" required>
                </div>
            </div>


            <button class="my-3 btn btn-primary" type="submit">Adicionar Item</button>
        </form>
        <?php if (!empty($_SESSION["itens"])) { ?>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>
                                produto
                            </td>
                            <td>
                                quantidade
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION["itens"] as $indice => $value) { ?>
                            <tr>

                                <td><?php
                                    echo mysqli_fetch_assoc(
                                        mysqli_query(
                                            $conn,
                                            "SELECT nome FROM produtos WHERE cod = {$value["id"]};"
                                        )
                                    )["nome"];
                                    ?></td>
                                <td><?php echo $value["qtd"]; ?></td>
                                <td><a class="btn btn-warning" href="editar_item.php?id=<?php echo $indice; ?>">Editar Item</a>
                                </td>
                                <td><a class="btn btn-danger" href="confirm_exclusao_item.php?id=<?php echo $indice; ?>">Remover
                                        Item</a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>