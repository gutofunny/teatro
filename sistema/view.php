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

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/style.css" rel="stylesheet">
</head>
<body>
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
				<a class="navbar-brand" href="#">S-GAT</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../sistema/listagenda.php">Listar Agenda</a></li>
					<li><a href="../sistema/agendar.php">Solicitar Agenda</a></li>
					<li><a href="principal.php?logout=ok">Sair</a></li>
					<li><a href="../sistema/ajuda.html">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="main" class="container-fluid">
		</br>
		<h3 class="page-header">Seja bem vindo! <?php echo $_SESSION['usuario']; ?></h3>
	</div>

	<!-- Tela de Vizualização a partir daqui -->

	<div id="main" class="container-fluid">
		<h3 class="page-header">Visualizar Pauta"ID"</h3>
		<form action="index.html">

			<div class="row">

				<div class="col-md-4">
					<p>
						<strong>Login</strong>
					</p>
					<p>{Valor do Campo}</p>
				</div>

				<div class="col-md-12">
					<p>
						<strong>Título</strong>
					</p>
					<p>{Valor do Campo}</p>
				</div>

				<div class="col-md-12">
					<p>
						<strong>Descrição</strong>
					</p>
					<p>{Valor do Campo}</p>
				</div>

				<div class="col-md-4">
					<p>
						<strong>Hora</strong>
					</p>
					<p>{Valor do Campo}</p>
				</div>

				<div class="col-md-4">
					<p>
						<strong>Data</strong>
					</p>
					<p>{Valor do Campo}</p>
				</div>

				<div class="col-md-4">
					<p>
						<strong>Situação</strong>
					</p>
					<p>{Valor do Campo}</p>
				</div>


			</div>



		</form>

		<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
 <?php
 else :
	header('Location: naopermitido.html');
endif;
?>
