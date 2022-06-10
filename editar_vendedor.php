<?php
session_start();

include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * FROM vendedor WHERE cod = $id;";
$conn_result = mysqli_query($conn, $sql);
$resul = mysqli_fetch_assoc($conn_result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Vendedor</title>
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
    <form action="lib/actions/vendedor/update.php" method="POST">

        <div>
            <div>
                <label for="nome">Nome</label>
            </div>
            <div>
                <input type="text" name="nome" required id="nome" value="<?php echo $resul["nome"]; ?>" />
            </div>
        </div>
        <div>
            <div>
                <label for="endereco">Endereço</label>
            </div>
            <div>
                <input type="text" name="endereco" required id="endereco" value="<?php echo $resul["endereco"]; ?>" />
            </div>
        </div>
        <div>
            <div>
                <label for="cidade">Cidade</label>
            </div>
            <div>
                <input type="text" name="cidade" id="cidade" value="<?php echo $resul["cidade"]; ?>" required />
            </div>
        </div>
        <div>
            <div>
                <label for="estado">Estado</label>
            </div>
            <div>
                <input type="text" name="estado" id="estado" value="<?php echo $resul["estado"]; ?>" required />
            </div>
        </div>
        <div>
            <div>
                <label for="telefone">telefone</label>
            </div>
            <div>
                <input type="text" name="telefone" id="telefone" value="<?php echo $resul["telefone"]; ?>" required />
            </div>
        </div>
        <div>
            <div>
                <label for="porc_comissao">Porcentagem da comissão</label>
            </div>
            <div>
                <input type="number" name="porc_comissao" id="porc_comissao" value="<?php echo $resul["porc_comissao"]; ?>" required />
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $resul["cod"]; ?>">

        <button type="submit">Alterar Vendedor</button>
    </form>
    <div>
        <div>
            <?php
            if (!empty($_SESSION["resul"])) {
                echo $_SESSION["resul"];
                unset($_SESSION["resul"]);
            }
            ?>
        </div>
        <div>
            <a href="listar_vendedor.php">Listagem de Vendedores</a>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>