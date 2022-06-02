<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Exclusão do Item</title>
</head>

<body>
    <div>
        <h1>Exclusão do Item</h1>
        <form action="lib/actions/item_venda/remove_item.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit">Confirmar deleção</button>
        </form>
    </div>
</body>

</html>