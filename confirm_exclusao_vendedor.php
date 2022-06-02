<?php
session_start();

include("lib/connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT cod, nome FROM vendedor WHERE cod = $id;";
$conn_result = mysqli_query($conn, $sql);
$resul = mysqli_fetch_assoc($conn_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirma Exclusão</title>
</head>

<body>
    <h1>
        Você confirma a deleção do vendedor <?php echo $resul["nome"];  ?>
    </h1>
    <div>
        <form action="lib/actions/vendedor/delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $resul["cod"]; ?>">
            <button type="submit">Confirmar</button>
        </form>
    </div>
</body>

</html>