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
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>