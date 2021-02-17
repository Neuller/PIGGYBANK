<?php require_once "./Dependencias.php" ?>
<!DOCTYPE html>
<html>
	<body class="bgMain">
		<div class="container painel col-md-4 offset-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						OLÁ! SEJA BEM VINDO(A) AO PIGGY BANK.
					</div>
					<div class="panel panel-body">
						<div class="imagemPainel">
							<img class="img-responsive img-thumbnail" src="Img/PiggyBank.png">
						</div>

						<form id="frmLogin">
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label class="itensLeft">USUÁRIO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" name="usuario" id="usuario" maxlenght="20">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label class="itensLeft">SENHA<span class="required">*</span></label>
									<input type="password" name="senha" id="senha" class="form-control input-sm text-uppercase" maxlenght="10">
								</div>
							</div>
							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="btnRight">
									<span class="btn btn-primary" id="acessar" title="ACESSAR">ACESSAR</span>
									<span class="btn btn-success" id="registrar" title="REGISTRAR">REGISTRAR</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	</body>
</html>

<script type="text/javascript">
	$('#acessar').click(function() {
		var usuario = $("#usuario").val();
		var senha = $("#senha").val();

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