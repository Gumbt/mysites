<!DOCTYPE html>
<html>
	
  <head>
    <meta charset="UTF-8">
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
    <title>Pagina Inicial</title>
        <link rel="stylesheet" href="css/EstiloAll.css">
		<link rel="stylesheet" href="css/EstiloPages.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/login.css">
  </head>
  <body>
		
		
		<div id="login" style="z-index: 50;margin-top: 58px;">
			<h1>Faça o login para continuar</h1>
			<div id="triangle2" style="margin-top:-10px;"></div>
		</div>
		
<?php
	require_once("config/config.php");
	$pdo = Database::connect();
	$falha = null;
	if(!empty($_GET["falha"])){	
		$falha = $_GET["falha"];
		if($falha==1){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspSua senha ou login não conferem!!</h3>
			<a href="login.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
					<div class="iconssele">
						<i class="fa fa-check fa-2x"></i>
					</div>	
					<p>OK</p>
			</div></a>	
			</div>
			<div class="subpageselect">		
			</div>
		</div>';
		}
	}
	$inativo = null;
	if(!empty($_GET["inativo"])){	
		$inativo = $_GET["inativo"];
		if($inativo==1){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspVocê está inativo!!</h3>
				<h3>&nbsp&nbspNão tem permissão para acessar essa area!!</h3>
			<a href="login.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
					<div class="iconssele">
						<i class="fa fa-check fa-2x"></i>
					</div>	
					<p>OK</p>
			</div></a>	
			</div>
			<div class="subpageselect">		
			</div>
		</div>';
		}
	}
	$logout = null;
	if(!empty($_GET["logout"])){	
		$logout = $_GET["logout"];
		if($logout==1){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspVocê não está conectado!!</h3>
			<a href="login.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
					<div class="iconssele">
						<i class="fa fa-check fa-2x"></i>
					</div>	
					<p>OK</p>
			</div></a>	
			</div>
			<div class="subpageselect">		
			</div>
		</div>';
		}
	}
	
	
	$pdo = Database::disconnect();
	?>
	

	

	<body>
<center>
		<div class="login">
		  <h1>Bem Vindo!</h1>
		  <form name="contato" action="funcao/verifica_login.php" method="POST">

			<p><input type="text" name="login" class="login" placeholder="Nome de usuário" required></p>
			<p><input type="password" name="senha" class="senha" placeholder="Senha" required></p>



			<p class="submit"><input type="submit" name="commit" value="Entrar"></p>
		  </form>
		</div>




	  <div class="sobre">
		<p class="sobre-autor">
		  &copy; 2015 <a href="#">André</a> - <a href="#">Yuri</a><br>
		  <a href="#" target="_blank">Gustavo</a>
	  </div></center>
				
				
					
  </body>
</html>
