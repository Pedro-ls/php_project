<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Inclusão de Categorias </title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="container">
        <div class="py-3 mb-2">
            <hl class="h1"> Categorias - inclusão</hl>
        </div>
        <form class="form-control" method="POST" action="lib/actions/categoria/insert.php">
            <div class="form-group my-2">
                <div class="my-1"><label> Categoria: </label></div>
                <div class="my-3"> <input class="form-control" placeholder="Informe a descrição da categoria" required></div>
            </div>

            <div class="btn-group my-1">
                <div><button class="btn btn-success mx-1" type="submit">Enviar</button></div>
                <div> <button class="btn btn-primary mx-1" type="reset">Limpar</button></div>
            </div>

        </form>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>