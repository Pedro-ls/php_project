<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Vendedor</title>
</head>

<body>
    <form action="lib/actions/vendedor/insert.php" method="POST">
        <div>
            <div>
                <label for="nome">Nome</label>
            </div>
            <div>
                <input type="text" name="nome" required id="nome">
            </div>
        </div>
        <div>
            <div>
                <label for="endereco">Endereço</label>
            </div>
            <div>
                <input type="text" name="endereco" required id="endereco">
            </div>
        </div>
        <div>
            <div>
                <label for="cidade">Cidade</label>
            </div>
            <div>
                <input type="text" name="cidade" required id="cidade">
            </div>
        </div>
        <div>
            <div>
                <label for="estado">Estado</label>
            </div>
            <div>
                <input type="text" name="estado" required id="estado">
            </div>
        </div>
        <div>
            <div>
                <label for="telefone">telefone</label>
            </div>
            <div>
                <input type="text" name="telefone" required id="telefone">
            </div>
        </div>
        <div>
            <div>
                <label for="porc_comissao">Porcentagem da comissão</label>
            </div>
            <div>
                <input type="number" name="porc_comissao" required id="porc_comissao">
            </div>
        </div>

        <button type="submit">Cadastrar Vendedor</button>

    </form>
    <div>
        <div>
            <?php
            if (!empty($_SESSION["resul"])) {
                echo $_SESSION["resul"];
                unset($_SESSION["resul"]);
            }
            ?>
        </div>
        <div>
            <a href="./listar_vendedor.php">Listagem de Vendedores</a>
        </div>
    </div>
</body>

</html>