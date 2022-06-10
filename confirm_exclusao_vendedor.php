<?php
session_start();

include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT cod, nome FROM vendedor WHERE cod = $id;";
$conn_result = mysqli_query($conn, $sql);
$resul = mysqli_fetch_assoc($conn_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirma Exclusão</title>
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
    <h1>
        Você confirma a deleção do vendedor <?php echo $resul["nome"];  ?>
    </h1>
    <div>
        <form action="lib/actions/vendedor/delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $resul["cod"]; ?>">
            <button type="submit">Confirmar</button>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>