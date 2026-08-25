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
            <label for="cliente_id">Dono:</label>
            <select name="cliente_id">
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
        <h2>Adicione um novo dono!</h2>
        <form action="public/cadastrar_cliente.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email">
            <br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone">
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
                <h2>animais Cadastrados</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Idade</th>
                        <th>Nome do Dono</th>
                        <th>Ações</th>
                    </tr>
                    <?php while ($animais = mysqli_fetch_assoc($animal)) { ?>
                        <tr>
                            <td><?php echo $animais["id"] ?></td>
                            <td><?php echo $animais["nome"] ?></td>
                            <td><?php echo $animais["especie"] ?></td>
                            <td><?php echo $animais["raca"] ?></td>
                            <td><?php echo $animais["idade"] ?></td>
                            <td> <?php
                            $clientes = mysqli_query($conexao, "SELECT * FROM clientes");
                            while ($cliente = mysqli_fetch_assoc($clientes)) {
                                echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . "</option>";
                            }
                            ?></td>
                            <td>
                                <a href="public/editar_animal.php?id=<?php echo $animais["id"] ?>">Editar</a>
                                <a href="public/excluir_animal.php?id=<?php echo $animais["id"] ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

              <div>
                <h2>donos Cadastrados</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                    </tr>
                    <?php while ($clientes = mysqli_fetch_assoc($clientes)) { ?>
                        <tr>
                            <td><?php echo $clientes["id"] ?></td>
                            <td><?php echo $clientes["nome"] ?></td>
                            <td><?php echo $clientes["telefone"] ?></td>
                            <td>
                                <a href="public/editar_cliente.php?id=<?php echo $clientes["id"] ?>">Editar</a>
                                <a href="public/excluir_cliente.php?id=<?php echo $clientes["id"] ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
                        <th>Ações</th>
                    </tr>
                    <?php while ($animais = mysqli_fetch_assoc($animal)) { ?>
                        <tr>
                            <td><?php echo $animais["id"] ?></td>
                            <td><?php echo $animais["nome"] ?></td>
                            <td><?php echo $animais["especie"] ?></td>
                            <td><?php echo $animais["raca"] ?></td>
                            <td><?php echo $animais["idade"] ?></td>
                            <td> <?php
                            $clientes = mysqli_query($conexao, "SELECT * FROM clientes");
                            while ($cliente = mysqli_fetch_assoc($clientes)) {
                                echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . "</option>";
                            }
                            ?></td>
                            <td>
                                <a href="public/editar_animal.php?id=<?php echo $animais["id"] ?>">Editar</a>
                                <a href="public/excluir_animal.php?id=<?php echo $animais["id"] ?>">Excluir</a>
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