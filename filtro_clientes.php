<?php
include("./lib/connection.php");

$nome = $_POST["nome"];

$sql = "SELECT * FROM cliente WHERE nome LIKE '%$nome%';";
$resul  = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar clientes</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="text-center">
        <h1 class="h1">Resultado filtro de Clientes</h1>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>nome</th>
                    <th>endereco</th>
                    <th>telefone</th>
                    <th>limite do cartão</th>
                    <th>cidade</th>
                    <th>email</th>
                    <th>CPF</th>
                    <th>estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resul)) { ?>
                <tr>
                    <td><?php echo $row["nome"];  ?></td>
                    <td><?php echo $row["endereco"]; ?></td>
                    <td><?php echo $row["telefone"]; ?></td>
                    <td><?php echo $row["limite_cred"]; ?></td>
                    <td><?php echo $row["cidade"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["CPF"]; ?></td>
                    <td><?php echo $row["estado"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>