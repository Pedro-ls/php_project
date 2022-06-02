<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Produto</title>
</head>

<body bgcolor="MediumAquamarine">
	<?php
	if (!empty($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}

	?>

	<p>
	<h1> Cadastro - Produto</p>
		<form method="POST" action='lib/actions/produto/insert.php'>
			<label>Nome: <input type="text" size="80" name="nome" maxlenght="100" riquired></label>

			<lable>Preço: <input type="number" name="preco" min="0" max="100" step=".01" required> </lable>
			<p>
				<lable>Quantidade no Estoque: <input type="number" name="qtd_estoque" required> </lable>
			<p>
				<lable>Unidade: <input type="number" name="unidade_medida" required> </lable>


			<p>
				<label>Categoria: <select name="id"> </label>
				</lable>

				<?php
				include 'lib/connection.php';
				$query = 'SELECT * FROM categoria ORDER BY descricao';
				$resu = mysqli_query($conn, $query) or die(mysqli_connect_error());
				while ($reg = mysqli_fetch_array($resu)) {
				?>
					<option value="<?php echo $reg['id']; ?>"> <?php echo $reg['descricao']; ?></option>
				<?php
				}
				mysqli_close($conn);
				?>
				</select>
				<input type="submit" value="Enviar">
				<input type="reset" value="Limpar">
		</form>
</body>

</html>