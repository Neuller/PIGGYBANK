<?php 
class usuarios{
	public function CadastrarUsuarios($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$data = date('Y-m-d');
		$sql = "INSERT into usuarios (nome, usuario, email, senha, data_cadastro) 
		VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$data')";

		return mysqli_query($conexao, $sql);
	}

	public function login($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$senha = sha1($dados[1]);

		$_SESSION['User'] = $dados[0];
		$_SESSION['IDUser'] = self::trazerID($dados);

		$sql = "SELECT * from usuarios 
		WHERE usuario = '$dados[0]' and senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		if (mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function trazerID($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$senha = sha1($dados[1]);

		$sql = "SELECT id_usuario from usuarios
		WHERE usuario = '$dados[0]' and senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		return mysqli_fetch_row($result)[0];
	}
}
?>
