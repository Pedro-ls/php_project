<?php
session_start();

$_SESSION["itens"][$_POST["id"]] = ["id" => $_POST["item"], "qtd" => $_POST["qtd"]];

header("Location: ../../../cadastrar_venda.php");