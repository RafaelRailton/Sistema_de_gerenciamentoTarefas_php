<?php
session_start();
$data = $_SESSION['tasks'][$_GET['key']];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <div class="details-container">
        <div class="header">
            <h1><?php echo $data['titulo'] ?></h1>
        </div>
    <div class="row">
        <div class="details">
            <d1>
                <dt>Descrição da Tarefa:</dt>
                <dd><?php echo $data['descricao'] ?></dd>
                <dt>Data da Tarefa:</dt>
                <dd><?php echo $data['data'] ?></dd>
            </d1>

        </div>
        <div class="image">
            <img src="uploads/<?php echo $data['image'] ?>" alt="Imagem Tarefa">
        </div>
    </div>
<div class="footer">
<p>Desenvolvido por @RafaelAlmeida</p>
</div>
    </div>
</body>
</html>