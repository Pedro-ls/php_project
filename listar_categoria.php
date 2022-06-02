<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('lib/connection.php');

$sql = "SELECT * FROM categoria ORDER BY descricao;";
$resul = mysqli_query($conn, $sql) or die(mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div class="container">
        <!--for demo wrap-->
        <div>
            <h1 class="h1">Categorias</h1>
        </div>
        <div>
            <a href="cadastrar_categoria.php">Cadastrar Categoria</a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($reg = mysqli_fetch_array($resul)) {

                    ?>
                        <tr>
                            <td><?php echo $reg["descricao"]; ?></td>
                            <td><a class="btn btn-warning " href="editar_categoria.php?id=<?php echo $reg["id"]; ?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="confirm_categoria.php?id=<?php echo $reg["id"]; ?>">Excluir</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php mysqli_close($conn); ?>
</body>

</html>