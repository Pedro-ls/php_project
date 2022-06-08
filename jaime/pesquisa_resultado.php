<?php
    include_once("conexao.php");
    $pesq_1 = $_POST['nome'];
    $pesq_2 = $_POST['cod'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Pesquisa</title>
</head>
<body>
    <h2><p align="center">Resultado Pesquisa</h2>
    <table width="100%" border="1">
        <tr>
            <td>COD</td>
            <td>NOME</td>
            <td>PRECO</td>
            <td>ESTOQUE</td>
            <td>UNIDADE</td>
        </tr>


<?php
    if (empty ($pesq_1) && (empty($pesq_2))){
        $sql = "SELECT * FROM produto ORDER BY nome";
    }elseif (!empty($pesq_2) && (empty($pesq_2))){
        $sql = "SELECT * FROM produto WHERE nome like '%pesp_1%' ORDER BY nome";
    }elseif (empty($pesq_1) && (!empty($pesq_2))){
        $sql = "SELECT * FROM produto WHERE cod = '%pesp_2%' ORDER BY nome";
    }else{
        $sql = "SELECT * FROM produto WHERE nome like '%pesp_1%'  or cod = '%pesp_2%' ORDER BY nome";
    }
    $resultado = mysqli_query ($con, $sql) or die("Erro ao retornar!");

while ($registro =  mysqli_fetch_array($resultado)){
    $cod = $registro['cod'];
    $nome = $registro['nome'];
    $preco = $registro['preco'];
    $qtd_estoque = $registro['qtd_estoque'];
    $unidade_medida = $registro['unidade_medida'];

    echo "<tr>";
    echo "<td>".$cod."</td>";
    echo "<td>".$nome."</td>";
    echo "<td>".$preco."</td>";
    echo "<td>".$qtd_estoque."</td>";
    echo "<td>".$unidade_medida."</td>";
    echo "</tr>";
}
mysqli_close($con);
echo"</table>"
?>
<br><a href="consulta_produto.php">Voltar</a><br>
</body>
</html>