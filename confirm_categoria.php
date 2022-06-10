<?php
session_start();
include('lib/connection.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM categoria WHERE id = $id;";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Excluir Categoria</title>
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
    <h1>Excluir Categoria</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <?php if (!empty($row)) { ?>
        <form method="POST" action="lib/actions/categoria/delete.php">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <label>Categoria: </label>
            <input type="text" name="descricao" value="<?php echo $row["descricao"]; ?>">
            <p><button type="submit">Confirma exclusão</button></p>
        </form>
    <?php } ?>
    <?php mysqli_close($conn); ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>