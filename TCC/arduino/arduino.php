<!DOCTYPE html>
<html>
	
  <head>
    <meta charset="UTF-8">
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.cookie.js"></script>
    <title>Arduino</title>
        <link rel="stylesheet" href="../css/EstiloAll.css">
		<link rel="stylesheet" href="../css/EstiloPages.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body><?php
	if(!empty($_GET["sucesso"]))
	{
		$sucesso = $_GET["sucesso"];
		if($sucesso==1){
		print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 200px auto;">
			<br>
				<h3>&nbsp&nbspAcesso permitido!!</h3>
			<a href="arduino.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
	if(!empty($_GET["falha"]))
	{
		$falha = $_GET["falha"];
		if($falha==1){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspUsuário <span style="color:red;">NÃO</span> tem acesso a está sala!!</h3>
			<a href="arduino.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
		if($falha==2){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspUsuário <span style="color:red;">NÃO</span> tem acesso a está sala!!</h3>
				<h3>&nbsp&nbspO usuário está inativo!!</h3>
			<a href="arduino.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
	}?>
		<header>
				<div class="menu">
					<ul>
						<li><a href="../index.php">INíCIO</a></li>
						<li>
							<a href='#'>CADASTROS</a>
							<ul>
								<li><a href="../index.php?colaborador=1">Colaborador</a> </li>
								<li><a href="../index.php?consultor=1">Consultor</a> </li>
								<li><a href="../index.php?sala=1">Salas</a></li>						
							</ul>
						</li>
						<li>
							<a href='#'>CONSULTAR</a>
							<ul>
								<li><a href="../page/consulta_cola.php">Colaborador</a> </li>
								<li><a href="../page/consulta_consultor.php">Consultor</a> </li>
								<li><a href="../page/consulta_sala.php">Sala</a></li>						
							</ul>
						</li>
					</ul>
				</div>
		</header>
		
		
		
		<div id="login">
			<h1>Arduino Teste</h1>
			<div id="triangle2" style="margin-top:-10px;"></div>
		</div>
		<script>
$(document).ready(function() {
	$('#collapseSelect').on('click', function(){
		$("#subpage").show(500);	
	});
});

$(document).ready(function() {
        $('#collapseSaveSelect').click(function() {
				$("#subpage").hide(500);
        });
    });
</script>
	<div class="mid">
				<div id="alinhamento" class="sidebar-search">
				<br>
				<br>
				</div>
					<div class="midpage">
				
				<div id="cadcolaborador">
				
					<center><h2>REPRESENTAÇÃO DE ARDUINO</h2></center><br>
					<form id='myForm' action='../arduino/insere_relatorio.php' method='POST' >
				
						<p class="esquerda">RFid*:&nbsp&nbsp<input name="rfid_total" type="text" size="20" maxlength="30" required></p>
<br>
						<p class="esquerda">Sala*:&nbsp&nbsp
						<?php 		
					//AQUI ABRE A CONEXÃO COM BANCO
					require_once("../config/config.php");
					$pdo = Database::connect();
					$sql = "SELECT nr_sala, bloco_sala, id_sala FROM sala ORDER BY bloco_sala ASC";
					$limitador = 0;
					foreach($pdo->query($sql) as $row)
					{
					
						print '<input type="radio" required name="salas_colab" value="'.$row["id_sala"].'" >'.$row["bloco_sala"] . " " . $row["nr_sala"].'&nbsp&nbsp';
						$limitador++;
						if($limitador==7){//quebra de linha das salas
						$limitador=0;
						echo "<br>";}
					}
						Database::disconnect();	
						//AQUI CONSULTA OS DADOS D0 ESTADO
				?>
						</p>
						<button type="submit">
							<div class="botao botaocola">
							<div class="iconsrela">
								<i class="fa fa-floppy-o fa-2x"></i>
							</div>	
							<p>ENVIAR</p>
							</div>
						</button>
</div>		
					
					
				</form>
				</div>
					
				
	</div>
					
  </body>
</html>
