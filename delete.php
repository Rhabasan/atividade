<?php

    require_once './vendor/autoload.php';

    use atividade\MySQLConnection;
    $bd = new MySQLConnection();
    $genero = null;

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $comando =$bd->prepare('SELECT * FROM generos WHERE id = :id');
        $comando->execute([':id' => $_GET['id']]);
        $genero = $comando->fetch(PDO::FETCH_ASSOC);
    } else {
        $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
        $comando->execute([':id' => $_POST['id']]);

        header('Location:/index.php');
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Deletar Gênero</title>
</head>
<body>
    <main class="container">
        <h1>Deletar</h1>
        <p>Tem certeza que quer remover o gênero "<?= $genero['nome'] ?>" ?</p>
        <form action="delete.php" method="post">
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" value="<?= $genero['id'] ?>"/>
            </div>
            <a class="btn btn-secondary" href="index.php">Voltar</a>
            <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
    </main>
    </body>
</html>