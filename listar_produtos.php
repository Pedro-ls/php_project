<?php
include_once("lib/connection.php");


$sql = "SELECT * FROM produtos AS p
join categoria c
on c.id = p.fk_categoria_id ;";
$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar!");

// print_r(mysqli_fetch_assoc($resultado));
// die();
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
    <div>
        <h1 class="h1 text-center">Listagem Produtos</h1>
    </div>
    <div class="container">
        <div>
            <a class="btn btn-primary" href="consulta_produto.php">Voltar</a>
        </div>

        <div>
            <form action="./filtro_produtos.php" method="post">
                <input class="form-control" type="text" name="categoria" id="categoria">
            </form>
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
</body>

</html>