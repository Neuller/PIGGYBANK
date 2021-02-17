<?php
require_once "./Classes/Conexao.php";

$obj = new conectar();
$conexao = $obj->Conexao();

$sql = "SELECT * from usuarios WHERE grupo_usuario = 'admin' or 'ADMIN' ";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if (mysqli_num_rows($result) > 0) {
	$validar = 1;
}
?>

<?php require_once "./Dependencias.php" ?>

<!DOCTYPE html>
<html lang="pt-br" class="Personalizado">

<body class="bgGray">
	<div class="container conteudo">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-default formLogin">
				<!-- PANEL HEADING -->
				<div class="panel-heading">
					OLÁ! ACESSE JÁ.
				</div>
				<!-- PANEL BODY -->
				<div class="panel panel-body">
					<!-- IMAGEM -->
					<div class="imagemPainel">
						<img src="Img/NSERV.png" width="100%">
					</div>
					<!-- FORMULÁRIO -->
					<form id="frmLogin" class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>USUÁRIO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="usuario" id="usuario" maxlenght="10">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>SENHA<span class="required">*</span></label>
								<input type="password" name="senha" id="senha" class="form-control input-sm text-uppercase" maxlenght="10">
							</div>
						</div>
						<!-- BOTÕES -->
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="btnRight">
							<?php if (!$validar) : ?>
								<span class="btn btn-success" id="registrar" title="REGISTRAR">REGISTRAR</span>
							<?php endif; ?>
								<span class="btn btn-primary" id="acessar" title="ACESSAR">ACESSAR</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
	});	

	$('#acessar').click(function() {
		var usuario = $("usuario").val();
		var senha = $("senha").val();

		if ((usuario == "") || (senha == "")) {
			alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
			return false;
		}

		dados = $('#frmLogin').serialize();

		$.ajax({
			type: "POST",
			data: dados,
			url: "./Procedimentos/Login/Login.php",
			success: function(r) {
				if (r == 1) {
					window.location = "./Principal.php";
				} else {
					alertify.error("ACESSO NEGADO");
				}
			}
		});
	});


	$('#registrar').click(function() {
		window.location = "./Registrar.php";
	});

	$("#senha").keypress(function(event) { 
        if (event.keyCode === 13) { 
            $("#acessar").click(); 
        } 
    }); 
</script>