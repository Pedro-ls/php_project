<?php
session_start();
include_once("lib/connection.php");

$pesq_1 = $_POST['categoria'];


$sql = "SELECT * FROM produtos AS p
join categoria c
on c.id = p.fk_categoria_id  WHERE lower( c.descricao) like lower('%$pesq_1%');";
$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar!");

$_SESSION["produtos"] = [
    $pesq_1
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Pesquisa</title>
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
    <h2>
        <h1 class="h1">Resultado Pesquisa</h1>
    </h2>
    <div class="container">
        <form action="pdf/relatorio.php" method="post">
            <button class="btn btn-primary" type="submit" name="type" value="produtos">Criar Relatorio</button>
        </form>
    </div>
    <div class="container">
        <div>
            <a class="btn btn-primary" href="listar_produtos.php">Voltar</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>COD</th>
                    <th>NOME</th>
                    <th>PRECO</th>
                    <th>ESTOQUE</th>
                    <th>UNIDADE</th>
                    <th>CATEGORIA</th>
                </tr>

            </thead>
            <tbody>
                <?php
                while ($registro =  mysqli_fetch_array($resultado)) {
                    $cod = $registro['cod'];
                    $nome = $registro['nome'];
                    $preco = $registro['preco'];
                    $qtd_estoque = $registro['qtd_estoque'];
                    $unidade_medida = $registro['unidade_medida'];
                    $categoria = $registro['descricao'];
                ?>
                    <tr>
                        <td><?php echo $cod ?></td>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $preco ?></td>
                        <td><?php echo $qtd_estoque ?></td>
                        <td><?php echo $unidade_medida ?></td>
                        <td><?php echo $categoria ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <?php
            mysqli_close($conn);

            ?>
        </table>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>