<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM animais WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

$animais = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - AUmigos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - AUmigos</h1>
    </header>
    <main>
        <h2>Editando o animal <?php echo $animais["nome"] ?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $animais["id"] ?>">

            <label for="titulo">Nome:</label>
            <input type="text" name="nome" value="<?php echo $animais["nome"] ?>">
            <br>
            <label for="autor">especie:</label>
            <input type="text" name="especie" value="<?php echo $animais["especie"] ?>">
            <br>
            <label for="ano">Idade:</label>
            <input type="number" name="idade" value="<?php echo $animais["idade"] ?>">
            <br>
            <label for="ano">Raça:</label>
            <input type="text" name="raca" value="<?php echo $animais["raca"] ?>">
            <br>
            <label for="cliente_id">Dono:</label>
            <select name="cliente_id">
                <?php
                $clientes = mysqli_query($conexao, "SELECT * FROM clientes");
                while ($cliente = mysqli_fetch_assoc($clientes)) {
                    echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . "</option>";
                }
                ?>
            </select>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>