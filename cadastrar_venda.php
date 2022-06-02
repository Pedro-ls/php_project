<?php
session_start();

include("lib/connection.php");

$sql_vendedor = "SELECT * FROM vendedor;";
$result_vendedor = mysqli_query($conn, $sql_vendedor);

$sql_cliente = "SELECT * FROM cliente;";
$result_cliente = mysqli_query($conn, $sql_cliente);

$sql_produtos = "SELECT * FROM produtos;";
$result_produtos = mysqli_query($conn, $sql_produtos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="lib/actions/venda/insert.php" method="POST">

        <div>
            <div>
                <div><label for="data">Data</label></div>
                <div><input type="date" name="data" id="data" required></div>
            </div>
            <div>
                <div><label for="prazo">Prazo de Entrega</label></div>
                <div><input type="text" name="prazo" id="prazo" required></div>
            </div>
            <div>
                <div><label for="cond">Condição de Pagamento</label></div>
                <div><input type="text" name="cond" id="cond" required></div>
            </div>
            <div>
                <label for="vendedor">
                    Vendedores
                </label>
            </div>
            <div>

                <select name="vendedor" id="vendedor" required>
                    <?php while ($row = mysqli_fetch_array($result_vendedor)) { ?>

                        <option value="<?php echo $row["cod"]; ?>"><?php echo $row["nome"]; ?></option>

                    <?php } ?>
                </select>

            </div>
            <div>
                <label for="cliente">
                    Clientes
                </label>
            </div>
            <div>
                <select name="cliente" id="cliente" required>
                    <?php while ($row = mysqli_fetch_array($result_cliente)) { ?>

                        <option value="<?php echo $row["codigo"]; ?>"><?php echo $row["nome"]; ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>

        <div>
            <button type="submit">Incluir Venda</button>
        </div>
    </form>
    <form action="lib/actions/item_venda/add_item.php" method="post">
        <select name="item" id="item" required>
            <?php while ($row = mysqli_fetch_array($result_produtos)) { ?>

                <option value="<?php echo $row["cod"]; ?>"><?php echo $row["nome"]; ?></option>

            <?php } ?>
        </select>
        <input type="number" name="qtd" required>
        <button type="submit">Adicionar Item</button>
    </form>
    <?php if (!empty($_SESSION["itens"])) { ?>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>
                            produto
                        </td>
                        <td>
                            quantidade
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["itens"] as $indice => $value) { ?>
                        <tr>

                            <td><?php
                                echo mysqli_fetch_assoc(
                                    mysqli_query(
                                        $conn,
                                        "SELECT nome FROM produtos WHERE cod = {$value["id"]};"
                                    )
                                )["nome"];
                                ?></td>
                            <td><?php echo $value["qtd"]; ?></td>
                            <td><a href="editar_item.php?id=<?php echo $indice; ?>">Editar Item</a></td>
                            <td><a href="confirm_exclusao_item.php?id=<?php echo $indice; ?>">Remover Item</a></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

</body>

</html>