<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("lib/connection.php");

$sql = "SELECT * FROM vendedor;";
$resul = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
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
        <div>
            <h1 class="h1">
                Listar Vendedores
            </h1>
        </div>

        <div>
            <a href="./cadastrar_vendedor.php">Cadastrar Vendedor</a>
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
                    <td>nome</td>
                    <td>endereço</td>
                    <td>cidade</td>
                    <td>estado</td>
                    <td>telefone</td>
                    <td>porcentagem da comissão</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($resul)) { ?>
                <tr>

                    <td><?php echo $row["nome"]; ?></td>
                    <td><?php echo $row["endereco"]; ?></td>
                    <td><?php echo $row["cidade"]; ?></td>
                    <td><?php echo $row["estado"]; ?></td>
                    <td><?php echo $row["telefone"]; ?></td>
                    <td><?php echo $row["porc_comissao"]; ?></td>
                    <td><a class="btn btn-warning" href="editar_vendedor.php?id=<?php echo $row["cod"]; ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="confirm_exclusao_vendedor.php?id=<?php echo $row["cod"]; ?>">Apagar</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>