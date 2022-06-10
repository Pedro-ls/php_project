<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("lib/connection.php");

$from  = $_POST["from"];
$to = $_POST["to"];

$sql = "SELECT * FROM venda_cli_ven WHERE ven_data BETWEEN '$from' AND '$to';";;
$resul = mysqli_query($conn, $sql);

$_SESSION["vendas"] = [
    $from, $to
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar vendas</title>
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
    <div>
        <h1 class="h1 text-center">
            Listar Vendas
        </h1>
    </div>
    <div>
        <form action="pdf/relatorio.php" method="post">
            <button class="btn btn-primary" type="submit" name="type" value="venda">Criar Relatorio</button>
        </form>
    </div>
    <div class="container">

        <div>
            <form+ action="filtro_venda_categoria.php">
                <input class="form-control" type="text">
                </form>
        </div>
        <div>
            <a class="text-capitalize text-primary font-weight-bold" href="./cadastrar_venda.php">Cadastrar Venda</a>
        </div>
        <div>
            <?php
            if (!empty($_SESSION["resul"])) {
                echo $_SESSION["resul"];
                unset($_SESSION["resul"]);
            }
            ?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>nome</th>
                    <th>Condição de Pagamento</th>
                    <th>data</th>
                    <th>prazo de entrega</th>
                    <th>cliente</th>
                    <th>Vendedor</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($resul)) { ?>
                <tr>

                    <td><?php echo $row["ven_data"]; ?></td>
                    <td><?php echo $row["cond_pag"]; ?></td>
                    <td><?php echo $row["prazo"]; ?></td>
                    <td><?php echo $row["cliente_nome"]; ?></td>
                    <td><?php echo $row["vendedor_nome"]; ?></td>
                    <td><a class="btn btn-warning" href="editar_venda.php?id=<?php echo $row["venda_numero"]; ?>">Editar</a>
                    </td>
                    <td><a class="btn btn-danger " href="confirm_exclusao_venda.php?id=<?php echo $row["venda_numero"]; ?>">Apagar</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>