<?php
include_once("./lib/connection.php");
$pesq_1 = "Monica";

$sql = "SELECT * FROM filtro_produto WHERE c.categoria LIKE '%$pesq_1 %' ORDER BY p.nome";
$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados da pesquisa produto");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa dos Produtos da Categoria</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <h2>
        <p class='text-center'>
        <h1 class="h1">PESQUISA PRODUTOS DA CATEGORIA: <?php echo $pesq_1; ?> </h1>
        </p>
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOME</th>
                <th>PRECO</th>
                <th>ESTOQUE</th>
                <th>UNIDADE</th>
            </tr>
        </thead>
        <tbody>
            <!-- Preenchendo a tabela com os dados do banco: -->
            <?php
            while ($row = mysqli_fetch_array($resultado)) {;
            ?>
                <tr>
                    <td><?php echo $row['cod']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['preco']; ?></td>
                    <td><?php echo $row['qtd_estoque']; ?></td>
                    <td><?php echo $row['unidade_medida']; ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
    <?php mysqli_close($conn);  ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>