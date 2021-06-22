<?php 

session_start();

class Tarefa {
    public $titulo;
    public $descricao;
    public $data;
    public $image;
    public function listar(){
        if(isset($_POST['task_name'])){
            if($_POST['task_name'] != ""){
                if(isset($_FILES['task_image'])){
                    $ext = strtolower(substr($_FILES['task_image']['name'],-4));
                    $file_name = md5(date('Y.m.d.H.i.s')) . $ext;
                    $dir = 'uploads/';
                    move_uploaded_file($_FILES['task_image']['tmp_name'],$dir.$file_name);
                }
                $lista = new Tesk_all();
                $lista->titulo    = $_POST['task_name'];
                $lista->descricao = $_POST['task_description'] ;
                $lista->data      = $_POST['task_date'];
                $lista->image     = $file_name;
                $data = [
                  "titulo"    => $lista->titulo,
                  "descricao" => $lista->descricao,
                  "data"      => $lista->data,
                  "image"     => $lista->image
                ];
                array_push($_SESSION['tasks'],$data);
                unset($lista);
                header('location:index.php');
            }else{
                $_SESSION['msg'] = "O campo nome da Tarefa não pode ser vazio!";
                header('location:index.php');
            }
            
        
        }

    }
}
class Tesk_all extends Tarefa{}

$listar = new Tesk_all();
$listar->listar();

if(isset($_GET['key'])){
    array_splice($_SESSION['tasks'],$_GET['key'],1);
    unset($_GET['key']);
    header('location:index.php');
}


// if(isset($_GET['task_name'])){
//     if($_GET['task_name'] != ""){
//         array_push($_SESSION['tasks'],$_GET['task_name']);
//         unset($_GET['task_name']);
//     }else{
//         $_SESSION['msg'] = "O campo nome da Tarefa não pode ser vazio!";
//     }

// }