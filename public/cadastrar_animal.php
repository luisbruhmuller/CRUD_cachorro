<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$especie = $_POST["especie"];
$raca = $_POST["raca"];
$idade = $_POST["idade"];
$cliente_id = $_POST["cliente_id"];

$sql = "INSERT INTO animais (nome, especie, raca, idade, cliente_id) VALUES ('$nome', '$especie', '$raca', '$idade', '$cliente_id')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>