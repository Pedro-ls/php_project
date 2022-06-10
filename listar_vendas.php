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
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div>
        <h1 class="h1 text-center">
            Listar Vendas
        </h1>
    </div>
    <div class="container">


        <div class="px-4 py-2">
            <a class="text-capitalize btn btn-primary font-weight-bold" href="./cadastrar_venda.php">Cadastrar
                Venda</a>
        </div>
        <div>
            <?php
            if (!empty($_SESSION["resul"])) {
                echo $_SESSION["resul"];
                unset($_SESSION["resul"]);
            }
            ?>
        </div>
        <form action="filtro_vendas.php" method="POST">
            <div class="row">
                <div class="col">
                    <div> <label for="from">De: </label></div>
                    <div> <input class="form-control" type="date" name="from" id="from"></div>


                </div>
                <div class="col">
                    <div> <label for="to">Até: </label></div>
                    <div> <input class="form-control" type="date" name="to" id="to"></div>


                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
                </div>
            </div>

        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>nome</th>
                    <th>Condição de Pagamento</th>
                    <th>data</th>
                    <th>prazo de entrega</th>
                    <th>cliente</th>
                    <th>Vendedor</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($resul)) { ?>
            <tr>

                <td><?php echo $row["ven_data"]; ?></td>
                <td><?php echo $row["cond_pag"]; ?></td>
                <td><?php echo $row["prazo"]; ?></td>
                <td><?php echo $row["cliente_nome"]; ?></td>
                <td><?php echo $row["vendedor_nome"]; ?></td>
                <td><a class="btn btn-warning" href="editar_venda.php?id=<?php echo $row["venda_numero"]; ?>">Editar</a>
                </td>
                <td><a class="btn btn-danger "
                        href="confirm_exclusao_venda.php?id=<?php echo $row["venda_numero"]; ?>">Apagar</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>