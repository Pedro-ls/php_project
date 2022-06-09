<?php
include_once("lib/connection.php");

$pesq_1 = $_POST['categoria'];


$sql = "SELECT * FROM produtos AS p
join categoria c
on c.id = p.fk_categoria_id  WHERE lower( c.descricao) like lower('%$pesq_1%');";
$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar!");
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
    <h2>
        <h1 class="h1">Resultado Pesquisa</h1>
    </h2>
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
</body>

</html>