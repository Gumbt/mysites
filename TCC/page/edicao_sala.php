<?php
session_start();
$verifica=$_SESSION["login"];
if(!empty($verifica))
{
	require_once("../config/config.php");
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if($verifica!="admin"){
				
		$sql = "SELECT * FROM consultor WHERE login_cons=?";
		$q = $pdo->prepare($sql);
		$q->execute(array($verifica));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$id_cons = $data["id_cons"];
	
	}

Database::disconnect();
?>
<!DOCTYPE html>
<html>
	
  <head>
    <meta charset="UTF-8">
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.cookie.js"></script>
    <title>Edição de Sala</title>
        <link rel="stylesheet" href="../css/EstiloAll.css">
		<link rel="stylesheet" href="../css/EstiloPages.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>
		<?php if($_SESSION["login"]=='admin'){?>
		<header>
				<div class="menu">
					<ul>
						<li><a href="../index.php">INíCIO</a></li>
						<li>
							<a href='#'>CADASTROS</a>
							<ul>
								<li><a href="../index.php?colaborador=1">Colaborador</a> </li>
								<li><a href="../index.php?consultor=1">Gestor</a> </li>
								<li><a href="../index.php?sala=1">Salas</a></li>						
							</ul>
						</li>
						<li>
							<a href='#'>CONSULTAR</a>
							<ul>
								<li><a href="../page/consulta_cola.php">Colaborador</a> </li>
								<li><a href="../page/consulta_consultor.php">Gestor</a> </li>
								<li><a href="../page/consulta_sala.php">Sala</a></li>						
							</ul>
						</li>
					</ul>
				</div>
		</header><?php } ?>
		
		<a href="../funcao/logout.php"><div id="logoutr"><h6><i class="fa fa-sign-out fa-2x">LOGOUT</i></h6></div></a>
		
		<div id="login">
			<h1>Edição</h1>
			<div id="triangle2" style="margin-top:-10px;"></div>
		</div>
	<div class="mid">
	<?php
	$id = null;
	if(!empty($_GET["id"]))
	{
		$id = $_GET["id"];
	}
	require_once("../config/config.php");
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM sala WHERE id_sala=?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
	$id_sala = $data["id_sala"];
	$nr_sala = $data["nr_sala"];
	$bloco_sala = $data["bloco_sala"];

	
	
	
	
	Database::disconnect();

?>
				<div id="alinhamento" class="sidebar-search">
				<br>
				<br>
				</div>
					<div class="midpage">
						
			<div id="cadsala">
				<form id="myForm3" action="../funcao/atualiza_cadastro_sala.php" method="POST">
				<?php if($verifica!="admin"){
				echo '<input name="id_cons" type="hidden" value="'.$id_cons.'">';
				}else{
				echo '<input name="id_cons" type="hidden" value="0">';
				}
				?>
					<center><h2>EDIÇÃO DE SALA</h2></center><br>
					<table>
					<tr>
						<td>Nome/Número da sala:</td>
						<td><input name="nr_sala" value="<?php echo !empty($nr_sala)?$nr_sala:'';?>" type="text" size="30" maxlength="50"></td>
						<input name="id_sala" type="hidden" value="<?php echo $id_sala;?>">
					</tr>
					<tr>
						<td>Bloco:</td>
						<td><select name="bloco_sala" style="width: 94%;" required>
						  <option value="">Selecione o bloco</option>
						  <option value="A" <?php echo ($bloco_sala=="A")?'selected':'';?>>Bloco A</option>
						  <option value="B" <?php echo ($bloco_sala=="B")?'selected':'';?>>Bloco B</option>
						  <option value="C" <?php echo ($bloco_sala=="C")?'selected':'';?>>Bloco C</option>
						</select></td>
					</tr>					
					</table>
					<table>
						<td><a href="../page/consulta_sala.php" style="color:white;">
							<div class="botao botaocola" id="limparCampos">
							<div class="iconsrela">
								<i class="fa fa-reply fa-2x"></i>
							</div>	
							<p>VOLTAR</p>
							</a></div>
						</td>
						<td><button type="submit">
							<div class="botao botaocola">
							<div class="iconsrela">
								<i class="fa fa-floppy-o fa-2x"></i>
							</div>	
							<p>SALVAR</p>
							</div>
						</button></td>
						</table>
					</form>
				</div>
					
				
	</div>
					
  </body>
</html>
<?php 
}else{
header("Location:../login.php?logout=1");
}

?>