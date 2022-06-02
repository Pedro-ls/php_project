<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("lib/connection.php");

$sql = "SELECT * FROM vendedor;";
$resul = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
</head>

<body>
    <h1>
        Listar Vendedores
    </h1>
    <div>
        <a href="./cadastrar_vendedor.php">Cadastrar Vendedor</a>
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
                <td>endereço</td>
                <td>cidade</td>
                <td>estado</td>
                <td>telefone</td>
                <td>porcentagem da comissão</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($resul)) { ?>
        <tr>

            <td><?php echo $row["nome"]; ?></td>
            <td><?php echo $row["endereco"]; ?></td>
            <td><?php echo $row["cidade"]; ?></td>
            <td><?php echo $row["estado"]; ?></td>
            <td><?php echo $row["telefone"]; ?></td>
            <td><?php echo $row["porc_comissao"]; ?></td>
            <td><a href="editar_vendedor.php?id=<?php echo $row["cod"]; ?>">Editar</a></td>
            <td><a href="confirm_exclusao_vendedor.php?id=<?php echo $row["cod"]; ?>">Apagar</a></td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>