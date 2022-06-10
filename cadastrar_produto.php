<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include 'lib/connection.php';
$query = 'SELECT * FROM categoria ORDER BY descricao';
$resu = mysqli_query($conn, $query) or die(mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php
	if (!empty($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}

	?>


    <h1 class="h1 text-center"> Cadastro - Produto</h1>
    <form class="form-control" method="POST" action='lib/actions/produto/insert.php'>
        <div>
            <label>Nome:</label>
            <input class="form-control" type="text" size="80" name="nome" maxlenght="100" required>

        </div>
        <div>
            <label>Preço: </label>
            <input class="form-control" type="number" name="preco" min="0" max="100" step=".01" required>

        </div>
        <div>
            <label>Quantidade no Estoque:</label>
            <input class="form-control" type="number" name="qtd_estoque" required>

        </div>
        <div>
            <label>Unidade:</label>
            <input class="form-control" type="number" name="unidade_medida" required>


        </div>
        <div>
            <label>Categoria: </label>
            <select class="form-control" name="categoria">
                <?php

				while ($reg = mysqli_fetch_array($resu)) {
				?>
                <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['descricao']; ?></option>
                <?php
				}
				mysqli_close($conn);
				?>
            </select>
        </div>
        <div>
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
        </div>
    </form>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>