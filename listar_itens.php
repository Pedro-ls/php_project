<?php
include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM itens_vendas_produto
WHERE id_venda = $id";

$resul = mysqli_query($conn, $sql);


// print_r(mysqli_fetch_assoc($resul));
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar itens</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class=" mb-5">
            <h1 class="h1 text-center">Itens da Venda</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        ID Venda
                    </th>
                    <th>
                        Produto
                    </th>
                    <th>
                        quantidade do item
                    </th>
                    <th>
                        Preço
                    </th>
                    <th>
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                 $soma = 0;
                
                while ($row = mysqli_fetch_array($resul)) { 
                    $total_item = $row["iv_qtd"] * $row["p_preco"];
                    $soma =  ($total_item) + $soma;
                    ?>
                    <tr>
                        <td><?php echo $row["id_venda"]; ?></td>
                        <td><?php echo $row["p_nome"]; ?></td>
                        <td><?php echo $row["iv_qtd"]; ?></td>
                        <td><?php echo $row["p_preco"];  ?></td>
                        <td><?php echo $total_item;  ?></td>
    
                    </tr>
                <?php } ?>
                   
            </tbody>
        </table>
        <div>
             <p>Total da Venda: <?php echo $soma; ?></p>
        </div>
     
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>