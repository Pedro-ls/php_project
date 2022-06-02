<?php
session_start();

unset($_SESSION["itens"][$_POST["id"]]);

header("Location: ../../../cadastrar_venda.php");