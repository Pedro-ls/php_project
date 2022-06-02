<?php
session_start();
$status = false;
$iterate = 0;
foreach ($_SESSION["itens"] as $ind => $item) {
    if ($item["id"] == $_POST["item"]) {
        $status = true;
        $pass = $iterate;
    }
    $iterate++;
}

if ($status == true) {
    $_SESSION["itens"][$pass]["qtd"] = $_SESSION["itens"][$pass]["qtd"] + $_POST["qtd"];
} else {
    $_SESSION["itens"][] = ["id" => $_POST["item"], "qtd" => $_POST["qtd"]];
}

header("Location: ../../../cadastrar_venda.php");