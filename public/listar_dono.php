<?php
include "../infra/conexao.php";

$clientes = mysqli_query($conexao, "SELECT * FROM clientes where id = {$_GET['id']}");
?>
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