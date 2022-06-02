<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>

<body>
    <form method="POST" action="lib/actions/cliente/insert.php">
        <div>
            <div><label for="nome">Nome:</label></div>
            <div><input type="text" name="nome" id="nome"></div>
        </div>
        <div>
            <div><label for="endereco">Endereco:</label></div>
            <div><input type="text" name="endereco" id="endereco"></div>
        </div>
        <div>
            <div><label for="telefone">Telefone: </label></div>
            <div><input type="tel" name="telefone" id="telefone"></div>
        </div>
        <div>
            <div><label for="limite_cred">Limite do Cartão:</label></div>
            <div><input type="number" step="0.1" name="limite_cred" id="limite_cred"></div>
        </div>
        <div>
            <div><label for="cidade">Cidade: </label></div>
            <div><input type="text" name="cidade" id="cidade"></div>
        </div>
        <div>
            <div><label for="email">Email: </label></div>
            <div><input type="email" name="email" id="email"></div>
        </div>
        <div>
            <div><label for="CPF">CPF: </label></div>
            <div><input type="text" name="CPF" id="CPF"></div>
        </div>
        <div>
            <select name="estado" id="estado">
                <option value="SP">São Paulo</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="MG">Minas Gerais</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="AM">Amazonas</option>
                <option value="AC">Acre</option>
            </select>
        </div>
        <div>
            <button type="submit">Cadastrar Cliente</button>
        </div>
    </form>
</body>

</html>