<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Produtos</title>
</head>
<body>
    <h3>Pesquisa de Pacientes</h3>
    <form method="POST" action="pesquisa_resultado.php">
        <label>Nome: </label><input type="text" name="nome" size="50"/>
        <label>Código: </label><input type="text" name="cod" maxlength="11"/>
        <p><input type="submit" value="Enviar" name="enviar"/><input type="reset" value="Limpar" name="limpar"/> 
    </form>
</body>
</html>