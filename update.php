<?php

    require_once './vendor/autoload.php';

    use atividade\MySQLConnection;
    $bd = new MySQLConnection();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $comando =$bd->prepare('SELECT * FROM generos WHERE id = :id');
        $comando->execute([':id' => $_GET['id']]);
        $genero = $comando->fetch(PDO::FETCH_ASSOC);
    } else {
        $comando = $bd->prepare('UPDATE generos SET nome =:nome WHERE id =:id');
        $comando->execute([
            ':nome' => $_POST['nome'],
            ':id' => $_POST['id']
        ]);
        header('Location:/index.php');
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gênero</title>
</head>
<body>
    <h1>Editar</h1>
    <form action="update.php" method= "post">
        <input type="hidden" name="id" value="<?php echo $genero['id']?>"/>
        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?=$genero['nome'] ?>"/>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>