<?php require_once "./Dependencias.php" ?>

<!DOCTYPE html>
<html>
	<body class="bgMain">
		<div class="container painel col-md-4 offset-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					CADASTRE-SE JÁ NO PIGGY BANK!
				</div>

				<div class="panel panel-body">
					<div class="imagemPainel">
						<img class="img-responsive img-thumbnail" src="Img/PiggyBank.png">
					</div>

					<form id="frmRegistro">
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label class="itensLeft">NOME COMPLETO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="nome" id="nome" maxlenght="100">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label class="itensLeft">USUÁRIO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="usuario" id="usuario" maxlenght="20">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label class="itensLeft">E-MAIL<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="email" id="email" maxlenght="50">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label class="itensLeft">SENHA<span class="required">*</span></label>
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
	</body>
</html>

<script type="text/javascript">
	$('#registrar').click(function() {
		var nome = $("#nome").val();
		var usuario = $("#usuario").val();
		var senha = $("#senha").val();
		var email = $("#email").val();

		if ((nome == "") || (usuario == "") || (senha == "") || (email == "")) {
			alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
			return false;
		}

		dados = $('#frmRegistro').serialize();

		var validaUser = verificarUser(usuario);
		debugger;
		if(validaUser == "YES"){
			alertify.error("USUÁRIO EXISTENTE");
			return false;
		}

		$.ajax({
			type: "POST",
			data: dados,
			url: "./Procedimentos/Login/CadastrarUsuarios.php",
			success: function(r) {
				if (r == 1) {
					alertify.confirm('CADASTRO REALIZADO', 'GOSTARIA DE REALIZAR O PRIMEIRO ACESSO?', function(){
						alertify.confirm().close();
						window.location = "./Principal.php";
					}, function(){
						window.location = "./index.php";
					});
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