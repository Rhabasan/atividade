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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>BIBLIOTECA</title>
</head>
<body>
    <main class="container">
    <a class="btn btn-primary" href="insert.php">Adicionar Novo</a>
        <table class="table table-borderless">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id']?></td>
                    <td><?=$g['nome'] ?></td>
                    <td> <a class="btn btn-secondary" href="update.php?id=<?=$g['id'] ?>">Editar</a> |
                        <a class="btn btn-danger" href="delete.php?id=<?=$g['id'] ?>">Remover</a></td>
                </tr>
                <?php endforeach ?>
        </table>
        </main>
</body>
</html>