<?php

include "infra/conexao.php";



$animal = mysqli_query($conexao, "SELECT * FROM animais");

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
        <h2>Adicione um novo animal!</h2>
        <form action="public/cadastrar_animal.php" method="POST">

            <br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="especie">Espécie:</label>
            <input type="text" name="especie">
            <br>
            <label for="raca">Raça:</label>
            <input type="text" name="raca">
            <br>
            <label for="idade">Idade:</label>
            <input type="number" name="idade">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria">
            <br>
            <label for="id_usuario">Usuário:</label>
            <select name="id_usuario">
                <?php
                $clientes = mysqli_query($conexao, "SELECT * FROM clientes");
                while ($cliente = mysqli_fetch_assoc($clientes)) {
                    echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . "</option>";
                    }
                    ?>
            </select>
            <br>
            <button type="submit">Cadastrar</button>
        </form>
        <h2>Adicione um novo usuário!</h2>
        <form action="public/cadastrar_usuario.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email">
            <br>
            <button type="submit">Cadastrar</button>
        </form>
        <h2>listar por usuario</h2>
        <form action="public/listar_prato_usuario.php" method="POST">
            <label for="id_usuario">Usuário:</label>
            <select name="id_usuario">
                <?php
                $clientes = mysqli_query($conexao, "SELECT * FROM clientes");
                while ($cliente = mysqli_fetch_assoc($clientes)) {
                    echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . "</option>";
                    }
                    ?>
            </select>
            <br>
            <button type="submit">Listar</button>
        <div>
            <h2>Pratos Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                <?php while ($animal = mysqli_fetch_assoc($animal)) { ?>
                    <tr>
                        <td><?php echo $animal["id"] ?></td>
                        <td><?php echo $animal["nome"] ?></td>
                        <td><?php echo $animal["especie"] ?></td>
                        <td><?php echo $animal["raca"] ?></td>
                        <td><?php echo $animal["idade"] ?></td>
                        <td><?php echo $animal["dono"] ?></td>
                        <td>
                            <a href="public/editar_animal.php?id=<?php echo $animal["id"] ?>">Editar</a>
                            <a href="public/excluir_animal.php?id=<?php echo $animal["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </main>
    <footer>

    </footer>


</body>

</html>