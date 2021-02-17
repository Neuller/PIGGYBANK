function verificarUser($usuario){
    $.ajax({
        type: "POST",
        data: "usuario=" + $usuario,
        url: "./Procedimentos/Login/VerificarUsuario.php",
        success: function(r) {
            debugger;
            if (r == 1) {
                return "YES";
            } else {
                return "NO";
            }
        }
    });
}

function verificarEmail(){
    
}