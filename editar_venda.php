<?php

include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql_vendas = "SELECT * FROM venda_cli_ven WHERE venda_numero = $id;";
$result_vendas = mysqli_query($conn, $sql_vendas);

$sql_vendedor = "SELECT * FROM vendedor;";
$result_vendedor = mysqli_query($conn, $sql_vendedor);

$sql_cliente = "SELECT * FROM cliente;";
$result_cliente = mysqli_query($conn, $sql_cliente);

$venda = mysqli_fetch_assoc($result_vendas);

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

    <form action="lib/actions/venda/update.php" method="POST">

        <div>
            <div>
                <div><label for="data">Data</label></div>
                <div><input type="date" name="data" id="data" value="<?php echo $venda["ven_data"]; ?>"></div>
            </div>
            <div>
                <div><label for="prazo">Prazo de Entrega</label></div>
                <div><input type="text" name="prazo" id="prazo" value="prazo"></div>
            </div>
            <div>
                <div><label for="cond">Condição de Pagamento</label></div>
                <div><input type="text" name="cond" id="cond" value="<?php echo $venda["cond_pag"]; ?>"></div>
            </div>
            <div>
                <label for="vendedor">
                    Vendedores
                </label>
            </div>
            <div>

                <select name="vendedor" id="vendedor" value="<?php echo $venda["cod_vendedor"]; ?>">
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
                <select name="cliente" id="cliente">
                    <?php while ($row = mysqli_fetch_array($result_cliente)) { ?>

                        <option value="<?php echo $row["codigo"]; ?>"><?php echo $row["nome"]; ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <button type="submit">Incluir Venda</button>
        </div>
    </form>

</body>

</html>