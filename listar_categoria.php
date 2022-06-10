<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('lib/connection.php');

$sql = "SELECT * FROM categoria ORDER BY descricao;";
$resul = mysqli_query($conn, $sql) or die(mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

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
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div class="container">
        <!--for demo wrap-->
        <div>
            <h1 class="h1">Categorias</h1>
        </div>
        <div>
            <a href="cadastrar_categoria.php">Cadastrar Categoria</a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($reg = mysqli_fetch_array($resul)) {

                    ?>
                        <tr>
                            <td><?php echo $reg["descricao"]; ?></td>
                            <td><a class="btn btn-warning " href="editar_categoria.php?id=<?php echo $reg["id"]; ?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="confirm_categoria.php?id=<?php echo $reg["id"]; ?>">Excluir</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php mysqli_close($conn); ?>
</body>

</html>