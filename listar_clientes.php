<?php
include("./lib/connection.php");
$sql = "SELECT * FROM cliente;";
$resul  = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar clientes</title>
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
    <div class="text-center">
        <h1 class="h1">Listar Clientes</h1>
    </div>
    <div class="container">
        <div>
            <form action="filtro_clientes.php" method="post">
                <input class="form-control" type="text" name="nome" id="nome" />
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>nome</th>
                    <th>endereco</th>
                    <th>telefone</th>
                    <th>limite do cartão</th>
                    <th>cidade</th>
                    <th>email</th>
                    <th>CPF</th>
                    <th>estado</th>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resul)) { ?>
                    <tr>
                        <td><?php echo $row["nome"];  ?></td>
                        <td><?php echo $row["endereco"]; ?></td>
                        <td><?php echo $row["telefone"]; ?></td>
                        <td><?php echo $row["limite_cred"]; ?></td>
                        <td><?php echo $row["cidade"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["CPF"]; ?></td>
                        <td><?php echo $row["estado"]; ?></td>
                        <td>
                            <a href="editar_cliente.php?id=<?php echo $row["codigo"]; ?>">Editar</a>
                        </td>
                        <td>
                            <a href="confirm_exclusao_cliente.php?id=<?php echo $row["codigo"]; ?>">Apagar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>