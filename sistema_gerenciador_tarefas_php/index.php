<?php 
session_start();
if(!isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}

if(isset($_GET['clear'])){
    unset($_SESSION['tasks']);
    unset($_GET['clear']);
}
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
    <div class="container">
   
    
    <div class="header">
    <h1>Gerenciador de Tarefas</h1>
    </div>
    <div class="form">
    <form action="task.php" method="Post" enctype="multipart/form-data">
    <label for="task_name">Tarefa:</label>
    <input type="text" name="task_name" placeholder="Nome da Tarefa">
    <label for="task_description">Descrição:</label>
    <input type="text" name="task_description" placeholder="Descrição da Tarefa">
    <label for="task_date">Data:</label>
    <input type="date" name="task_date" id="">
    <label for="task_image">Imagem:</label>
    <input type="file" name="task_image" id="">
    <input type="hidden" name="insert" value="insert">
    <button type="submit">Cadastrar</button>
    </form>
    <?php 
       if(isset($_SESSION['msg'])){
           echo"<p style='color:#EF5350'>".$_SESSION['msg']."</p>";
            unset($_SESSION['msg']);       }
    ?>
    </div>
    <div class="separator">
    </div>
    <div class="list-tasks">
        <?php if(isset($_SESSION['tasks'])){
    echo "<ul>" ;
    foreach($_SESSION['tasks'] as $key => $task){
        echo"<li>
        <div class='nome'>
        <a href='detals.php?key=$key'>".$task['titulo']."</a></div>
       <div class='alinhar'> <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button> </div>
        <script>
             function deletar$key(){
                if(confirm('Confirmar remoção?')){
                    window.location = 'http://localhost/Projetos_pessoais/sistema_gerenciador_tarefas_php/task.php?key=$key';
                }
                return false;
             }        
        </script>
             </li>";
    }
echo"</ul>";
        } ?>
 
<form action="" method="get">
<input type="hidden" name="clear" value="clear">
<button type="submit" class="btn-clear">Limpar Tarefas</button>
</form>

    </div>
    <div class="footer">
    <p>Desenvolvido por @RafaelAlmeida</p>
    </div>
    </div>
</body>
</html>