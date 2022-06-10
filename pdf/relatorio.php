<?php

session_start();
include("../lib/connection.php");
include("../lib/relatorio_pdf.php");


function body($body)
{
    return '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>' . $body .
        '</body> <script src="../bootstrap/js/bootstrap.bundle.min.js"></script></html>';
}


$type = $_POST["type"] != "" ?
    $_POST["type"] :
    "Erro ao passar argumento";
if ($type == "venda") {
    $from = $_SESSION["vendas"][0];
    $to =  $_SESSION["vendas"][1];
    $sql = "SELECT * FROM venda_cli_ven WHERE ven_data BETWEEN '$from' AND '$to';";;
    $resul = mysqli_query($conn, $sql);


    $html = "
    <h1 class='h1 text-center'>Relatorio Venda</h1>
    <div class='container'>
    <table>
    <thead>
        <tr>
            <th>Condição de Pagamento</th>
            <th>data</th>
            <th>prazo de entrega</th>
            <th>cliente</th>
            <th>Vendedor</th>
        </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_array($resul)) {
        $html .= '<tbody><tr>
        <td>' . $row["cond_pag"] . '</td>
    <td>' . $row["ven_data"] . '</td>
   
    <td>' . $row["prazo"] . '</td>
    <td>' . $row["cliente_nome"] . '</td>
    <td>' . $row["vendedor_nome"] . '</td>
</tr></tbody>';
    }
    $html .= "</table></div>";
    generate_pdf($html);
    unset($_SESSION["vendas"]);
} else if ($type == "produtos") {
    $pesq_1 = $_SESSION["produtos"][0];
    $sql = "SELECT * FROM produtos AS p
join categoria c
on c.id = p.fk_categoria_id  WHERE lower( c.descricao) like lower('%$pesq_1%');";
    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar!");
    $html = "<div class='container'>
    <table class='table'>
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
               <tbody>";

    while ($registro =  mysqli_fetch_array($resultado)) {
        $cod = $registro['cod'];
        $nome = $registro['nome'];
        $preco = $registro['preco'];
        $qtd_estoque = $registro['qtd_estoque'];
        $unidade_medida = $registro['unidade_medida'];
        $categoria = $registro['descricao'];
        $html .= '
                   <tr>
                       <td>' . $cod . '</td>
                       <td>' . $nome . '</td>
                       <td>' . $preco . '</td>
                       <td>' . $qtd_estoque . '</td>
                       <td>' . $unidade_medida . '</td>
                       <td>' . $categoria . '</td>
                   </tr>
                   ';
    }
    ' </tbody>
             
           </table></div>';
    generate_pdf(body($html));
    unset($_SESSION["produtos"]);
}
mysqli_close($conn);