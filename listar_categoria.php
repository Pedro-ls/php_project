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
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/javascript.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <section>
        <!--for demo wrap-->
        <h1><b>Categorias</b></h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php

                    while ($reg = mysqli_fetch_array($resul)) {

                    ?>
                        <tr>
                            <td><?php echo $reg["descricao"]; ?></td>
                            <td><a href="editar_categoria.php?id=<?php echo $reg["id"]; ?>">Editar</a></td>
                            <td><a href="confirm_categoria.php?id=<?php echo $reg["id"]; ?>">Excluir</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>


    <?php mysqli_close($conn); ?>
</body>

</html>