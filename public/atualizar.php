<?php

include "../infra/conexao.php";
// atualizar animal
$id = $_POST["id"];
$nome = $_POST["nome"];
$especie = $_POST["especie"];
$idade = $_POST["idade"];
$raca = $_POST["raca"];
$cliente_id = $_POST["cliente_id"];

$sql = "UPDATE animais SET nome='$nome',especie='$especie',idade='$idade',raca='$raca' WHERE id = '$id' AND cliente_id = '$cliente_id'";

mysqli_query($conexao, $sql);
header("Location: ../index.php");

// atualizar cliente
$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$sql = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone' WHERE id = '$id'";

mysqli_query($conexao, $sql);
header("Location: ../index.php");
