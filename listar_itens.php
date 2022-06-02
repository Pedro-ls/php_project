<?php
include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "";

$resul = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar itens</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <td>
                        Produto
                    </td>
                    <td>
                        quantidade do item
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resul)) { ?>
                    <tr>
                        <td><?php echo ""; ?></td>
                        <td><?php echo ""; ?></td>
                        <td>Editar</td>
                        <td>Apagar</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>