<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("lib/connection.php");

$sql = "SELECT * FROM venda_cli_ven;";;
$resul = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar vendas</title>
</head>

<body>
    <h1>
        Listar Vendas
    </h1>
    <div>
        <a href="./cadastrar_venda.php">Cadastrar Venda</a>
    </div>
    <div>
        <?php
        if (!empty($_SESSION["resul"])) {
            echo $_SESSION["resul"];
            unset($_SESSION["resul"]);
        }
        ?>
    </div>
    <table>
        <thead>
            <tr>
                <td>nome</td>
                <td>Condição de Pagamento</td>
                <td>data</td>
                <td>prazo de entrega</td>
                <td>cliente</td>
                <td>Vendedor</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($resul)) { ?>
        <tr>

            <td><?php echo $row["ven_data"]; ?></td>
            <td><?php echo $row["cond_pag"]; ?></td>
            <td><?php echo $row["prazo"]; ?></td>
            <td><?php echo $row["cliente_nome"]; ?></td>
            <td><?php echo $row["vendedor_nome"]; ?></td>
            <td><a href="editar_venda.php?id=<?php echo $row["venda_numero"]; ?>">Editar</a></td>
            <td><a href="confirm_exclusao_venda.php?id=<?php echo $row["venda_numero"]; ?>">Apagar</a></td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>