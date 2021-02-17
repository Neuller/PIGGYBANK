<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj = new usuarios();

$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$senha = sha1($_POST["senha"]);

$dados = array(
    $nome,
    $usuario,
    $email,
    $senha
);

echo $obj -> CadastrarUsuarios($dados);
?>