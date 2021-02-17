<?php

require_once "./Classes/Conexao.php";

$obj = new conectar();
$conexao = $obj -> Conexao();

$sql = "SELECT * from usuarios WHERE grupo_usuario = 'admin' or 'ADMIN' ";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if (mysqli_num_rows($result) > 0) {
	header("location: ./index.php");
}

?>

<?php require_once "./Dependencias.php" ?>

<!DOCTYPE html>
<html>

<body class="bgGray">
	<div class="container conteudo">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-default formLogin">
				<!-- PANEL HEADING -->
				<div class="panel-heading">
					OLÁ! CADASTRE-SE JÁ.
				</div>

				<!-- PANEL BODY -->
				<div class="panel panel-body">
					<!-- IMAGEM -->
					<div class="imagemPainel">
						<img src="Img/NSERV.png" width="100%">
					</div>
					<!-- FORMULÁRIO -->
					<form id="frmRegistro" class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>GRUPO<span class="required">*</span></label>
								<select class="form-control input-sm" id="grupoSelect" name="grupoSelect">
                                        <option value="">SELECIONE UM GRUPO</option>
										<option value="ADMIN">ADMIN</option>
                                </select>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>NOME COMPLETO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="nome" id="nome" maxlenght="100">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>USUÁRIO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="usuario" id="usuario" maxlenght="10">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>E-MAIL</label>
								<input type="text" class="form-control input-sm text-uppercase" name="email" id="email" maxlenght="50">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>SENHA<span class="required">*</span></label>
								<input type="password" class="form-control input-sm text-uppercase" name="senha" id="senha" maxlenght="10">
							</div>
						</div>
						<!-- BOTÕES -->
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="btnRight">
								<span class="btn btn-danger" id="voltar" title="VOLTAR">VOLTAR</span>
								<span class="btn btn-primary" id="registrar" title="REGISTRAR">REGISTRAR</span>
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

	$('#registrar').click(function() {
		var nome = $("#nome").val();
		var usuario = $("#usuario").val();
		var senha = $("#senha").val();

		if ((nome == "") || (usuario == "") || (senha == "")) {
			alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
			return false;
		}

		dados = $('#frmRegistro').serialize();

		$.ajax({
			type: "POST",
			data: dados,
			url: "./Procedimentos/Login/CadastrarUsuarios.php",
			success: function(r) {
				if (r == 1) {
					$('#frmRegistro')[0].reset();
					window.location = "./index.php";
					alertify.success("CADASTRO REALIZADO");
				} else {
					alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
				}
			}
		});
	});

	$('#voltar').click(function() {
		window.location = "./index.php";
	});
</script>