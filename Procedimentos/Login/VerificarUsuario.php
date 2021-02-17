<?php
require_once "../../Classes/Conexao.php";
$c = new conectar();
$conexao = $c -> conexao();

$usuario = $_POST['usuario'];

if(isset($usuario)){
    if(($usuario != 0) && ($usuario != null) && ($usuario != "")){
        $sql = "SELECT * FROM usuarios WHERE usuario = '{$usuario}'";
        $result = mysqli_query($conexao, $sql) or print mysql_error();
        if(mysqli_num_rows($result) > 0){
            echo json_encode(1);
        }else{ 
            echo json_encode(0); 
        }
    }
}
?>