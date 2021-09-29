<?php
require_once './vendor/autoload.php';

use atividade\MySQLConnection; //PDO;

$bd = new MySQLConnection(); //('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('select * from generos');
$comando-> execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>BIBLIOTECA</title>
</head>
<body>
    <a href="insert.php">Adicionar Novo</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id']?></td>
                    <td><?=$g['nome'] ?></td>
                    <td> <a href="update.php?id=<?=$g['id'] ?>">Editar</a> |
                        <a href="delete.php?id=<?=$g['id'] ?>">Remover</a></td>
                </tr>
                <?php endforeach ?>
        </table>
</body>
</html>