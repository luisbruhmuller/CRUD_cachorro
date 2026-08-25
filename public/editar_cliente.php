<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

$clientes = mysqli_fetch_assoc($resultado);

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
        <h2>Editando o cliente <?php echo $clientes["nome"] ?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $clientes["id"] ?>">

            <label for="titulo">Nome:</label>
            <input type="text" name="nome" value="<?php echo $clientes["nome"] ?>">
            <br>
            <label for="autor">Email:</label>
            <input type="email" name="email" value="<?php echo $clientes["email"] ?>">
            <br>
            <label for="ano">Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $clientes["telefone"] ?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>