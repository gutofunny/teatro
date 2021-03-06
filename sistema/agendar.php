<?php
session_start();
function __autoload($classes) {
	require '../classes/'.$classes.'.class.php';
}

if(isset($_GET['logout'])):
	if ($_GET ['logout'] == 'ok'):
		Login::deslogar();
		endif;
	endif;

if (isset($_SESSION['logado'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de Gerenciamento de Agenda do Teatro</title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/style.css" rel="stylesheet">

</head>

<body>
    <?php
    if (isset($_POST['salvar'])) :
        $login = $_SESSION['usuario'];
        $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_MAGIC_QUOTES);
        $data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_MAGIC_QUOTES);
        $hora = filter_input(INPUT_POST, "hora", FILTER_SANITIZE_MAGIC_QUOTES);
        $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
        $situacao = 1;
        
        //Situação 1 para evento solicitado - padrão para solicitação

        $evento = new Eventos;
        $evento -> setLogin($login);
        $evento -> setTitulo($titulo);
        $evento -> setData($data);
        $evento -> setHora($hora);
        $evento -> setDescricao($descricao);
        $evento -> setSituacao($situacao);
        
        if($evento->inserir()) {?>
            ?><script type="text/javascript">
                <!--//-->
                window.alert("Solicita��o de pauta de evento cadastrada com sucesso!");
            </script>
        <?php }
    endif;
    ?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="principal.php">S-GAT</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../sistema/listagenda.php">Listar Agenda</a></li>
					<li><a href="../sistema/agendar.php">Solicitar Agenda</a></li>
					<li><a href="principal.php?logout=ok">Sair</a></li>
					<li><a href="../sistema/ajuda.php">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="main" class="container-fluid">
		</br>
		<!-- <h3 class="page-header">Seja bem vindo!</h3>  -->
		<h3 class="page-header">Seja bem vindo, <?php echo $_SESSION['nome']; ?></h3>
	</div>



	<div id="main" class="container-fluid">
		<h3 class="page-header">Solicitar Agenda</h3>
		<form action="" method="post">

			<div class="form-group col-md-6">
				<label for="campo1">T�tulo</label> 
				<input type="text" class="form-control" id="campo1" required="" name="titulo">
			</div>

			<div class="form-group col-md-3">
				<label for="calendario">Data (dd/mm/aaaa)</label> 
				<input type="text"class="form-control" id="calendario" required="" name="data">
			</div>


			<script>
				$(function() {
					$("#calendario").datepicker({
						dateFormat : 'dd/mm/yy',
						dayNames : ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
						dayNamesMin : ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
						dayNamesShort : ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
						monthNames : ['Janeiro', 'Fevereiro', 'Mar�o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
						monthNamesShort : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
					});
				});
            </script>

			<div class="form-group col-md-3">
				<label for="hora">Hora (hh:mm)</label> 
				<input type="time" class="form-control" name="hora" required="" name="hora">
			</div>

			<div class="form-group col-md-12">
				<label for="campo4">Descri��o</label> 
				<textarea rows="5" class="form-control" id="campo4" required="" name="descricao"></textarea>
			</div>
	
	</div>

	<!-- area de campos do formulario -->

	<hr />
	<div id="actions" class="row" align="center">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
			<a href="principal.php" class="btn btn-danger">Cancelar</a>

		</div>
	</div>
	</form>

	<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
 <?php
else :
$redi = include 'naopermitido.html';
echo $redi;
endif;
?>
