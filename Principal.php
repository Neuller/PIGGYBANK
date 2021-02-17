<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once "./Dependencias.php" ?>
        <?php require_once "./Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $idUsuario = $_SESSION['IDUser'];
        ?>
    </head>

    <body>
       
    </body>
</html>

<script type="text/javascript">
$(document).ready(function($) {
});
</script>

<?php
} else {
	header("location: ./index.php");
}
?>