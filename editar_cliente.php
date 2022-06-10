<?php
session_start();
include("lib/connection.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM cliente WHERE codigo = $id;";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container-fluid">
            <h1 class="navbar-brand text-light">Pagina Inicial</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Opções">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <a class="nav-link btn btn-primary active text-light" href="./listar_clientes.php">Listar
                        Clientes</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_produtos.php">Listar Produtos</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_vendas.php">Listar Venda</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_vendedor.php">Listar Vendedor</a>
                    <a class="mx-2 btn btn-primary active text-light" href="./listar_categoria.php">Listar Categoria</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div>
            <h1>Atualizar Cliente</h1>
        </div>
        <form class="form-control" method="POST" action="lib/actions/cliente/update.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <div><label for="nome">Nome:</label></div>
                <div><input class="form-control" type="text" name="nome" id="nome" value="<?php echo $row["nome"]; ?>">
                </div>
            </div>
            <div>
                <div>
                    <label for="endereco">Endereco:</label>
                </div>
                <div>
                    <input class="form-control" type="text" name="endereco" id="endereco" value="<?php echo $row["endereco"]; ?>">
                </div>
            </div>
            <div>
                <div><label for="telefone">Telefone: </label></div>
                <div><input class="form-control" type="tel" name="telefone" id="telefone" value="<?php echo $row["telefone"]; ?>"></div>
            </div>
            <div>
                <div><label for="limite_cred">Limite do Cartão:</label></div>
                <div><input class="form-control" type="number" step="0.1" name="limite_cred" id="limite_cred" value="<?php echo $row["limite_cred"]; ?>"></div>
            </div>
            <div>
                <div><label for="cidade">Cidade: </label></div>
                <div><input class="form-control" type="text" name="cidade" id="cidade" value="<?php echo $row["cidade"] ?>"></div>
            </div>
            <div>
                <div><label for="email">Email: </label></div>
                <div><input class="form-control" type="email" name="email" id="email" value="<?php echo $row["email"]; ?>"></div>
            </div>
            <div>
                <div><label for="CPF">CPF: </label></div>
                <div><input class="form-control" type="text" name="CPF" id="CPF" value="<?php echo $row["CPF"]; ?>">
                </div>
            </div>
            <div>
                <select class="form-control" name="estado" id="estado" value="<?php echo $row["estado"]; ?>">
                    <option value="SP">São Paulo</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="AM">Amazonas</option>
                    <option value="AC">Acre</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Atualizar Cliente</button>
            </div>
        </form>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>