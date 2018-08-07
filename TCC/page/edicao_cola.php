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
    <title>Edição de Colaborador</title>
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
	<?php
	$id = null;
	if(!empty($_GET["id"]))
	{
		$id = $_GET["id"];
	}
	require_once("../config/config.php");
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM colaborador WHERE id_colab=?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
	$id_colab = $data["id_colab"];
	$nome_colab = $data["nome_colab"];
	$snome_colab = $data["snome_colab"];
	$email_colab = $data["email_colab"];
	$end_colab = $data["end_colab"];
	$cep_colab = $data["cep_colab"];
	$cpf_colab = $data["cpf_colab"];
	$status_colab = $data["status_colab"];
	$tel_colab = $data["tel_colab"];		
	$rfid_colab = $data["rfid_colab"];
	
	
	$rfid_atual = $data["rfid_colab"];
	$cpf_atual = $data["cpf_colab"];
	
	
	
	Database::disconnect();

?>
				<div id="alinhamento" class="sidebar-search">
				<br>
				<br>
				</div>
					<div class="midpage">
						
				<div id="subpage" class="toggle">
			<div class="pageselect" style="margin: 0 auto;">
				<h4>&nbsp&nbspSalas cadastradas (Bloco / Sala):</h4>
				<div class="checklist">
				<form id='myForm' action='../funcao/atualiza_cadastro_cola.php' method='POST'>
				<?php if($verifica!="admin"){
				echo '<input name="id_cons" type="hidden" value="'.$id_cons.'">';
				}else{
				echo '<input name="id_cons" type="hidden" value="0">';
				}
				?>
				<input name="rfid_atual" type="hidden" value="<?php echo $rfid_atual;?>">
				<input name="cpf_atual" type="hidden" value="<?php echo $cpf_atual;?>">
				<div style="text-align: left;">
				<?php 		
					//AQUI ABRE A CONEXÃO COM BANCO
					require_once("../config/config.php");
					$pdo = Database::connect();
					
					$sql2 = "SELECT * FROM colaborador_has_sala WHERE colaborador_id_colab='$id'";					
					foreach($pdo->query($sql2) as $row)
					{
						$vetorsala[] = $row["sala_id_sala"];
					}
					
						$sql = "SELECT nr_sala, bloco_sala, id_sala FROM sala ORDER BY bloco_sala ASC";
							foreach($pdo->query($sql) as $row)
							{
						?>		
							<input type="checkbox" name="salas_colab[]" value="<?php echo $row["id_sala"]; ?>" <?php 
							if(!empty($vetorsala)){
								if (in_array($row["id_sala"], $vetorsala))
								{echo 'checked';}else{echo '';}
							}
								?>><?php echo $row["bloco_sala"] . " " . $row["nr_sala"]; ?><br>
					<?php	}
	
					
						Database::disconnect();	
						
						//AQUI CONSULTA OS DADOS D0 ESTADO
				?>	
				</div>
				</div>
				<div class="botaose2 botaoselect2" id="collapseSaveSelect">
					<div class="iconssele">
						<i class="fa fa-floppy-o fa-2x"></i>
					</div>	
					<p>SALVAR</p>
				</div>
			
			</div>
			<div class="subpageselect">		
			</div>
		</div>
				<div id="cadcolaborador">
				
					<center><h2>EDIÇÃO DE COLABORADOR</h2></center><br>
					<div class="cada1">
					
					<table>					
					<tr>
						<td>Nome*:</td>
						<td><input name="nome_colab" minlength="2" maxlength="50" value="<?php echo !empty($nome_colab)?$nome_colab:'';?>" type="text" size="30" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
						<input name="id_colab" type="hidden" value="<?php echo $id_colab;?>">
					</tr>
					<tr>
						<td>Sobrenome*:</td>
						<td><input name="snome_colab" minlength="2" maxlength="50" value="<?php echo !empty($snome_colab)?$snome_colab:'';?>" type="text" size="30" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
					</tr>
					<tr>
						<td>Email*:</td>
						<td><input name="email_colab" maxlength="50" value="<?php echo !empty($email_colab)?$email_colab:'';?>" type="email" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="exemplo@exemplo.com" maxlength="50" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
					</tr>
					<tr>
						<td>Telefone*:</td>
						<td><input name="tel_colab" value="<?php echo !empty($tel_colab)?$tel_colab:'';?>" type="text" size="30" pattern="\d*" minlength="11" maxlength="12" title="DDD+8 ou 9 números" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
					</tr>
					<tr>
						<td>Endereço*:</td>
						<td><input name="end_colab" value="<?php echo !empty($end_colab)?$end_colab:'';?>" type="text" size="30" minlength="2" maxlength="50" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
					</tr>					
					</table></div>
					<div class="cada2"><table>
					<tr>
						<td>CEP*:</td>
						<td><input name="cep_colab" value="<?php echo !empty($cep_colab)?$cep_colab:'';?>" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
					</tr>
					<tr style="height:35px;">
						<td>Status:</td>
						<td style="text-align:center;">
						  &nbsp&nbsp <input <?php echo isset($_GET["ver"])?'disabled':''; ?> type="radio" name="status_colab" value="ativo" <?php echo ($status_colab=="ativo")?'checked':'';?>>Ativo &nbsp&nbsp
						  <input <?php echo isset($_GET["ver"])?'disabled':''; ?> type="radio" name="status_colab" value="inativo" <?php echo ($status_colab=="inativo")?'checked':'';?>>Inativo
						</td>
					</tr>
					<tr>
						<td>CPF*:</td>
						<td><input name="cpf_colab" value="<?php echo !empty($cpf_colab)?$cpf_colab:'';?>" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" required <?php echo isset($_GET["ver"])?'disabled':''; ?>></td>
					</tr>					
					<tr>
						<td>ID*:</td>
						<td><input name="rfid_colab" value="<?php echo !empty($rfid_colab)?$rfid_colab:'';?>" type="text" size="30" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}" title="XX-YY-ZZ-WW" maxlength="11" required></td>
					</tr>
					<tr>
						<td>Salas*:</td>
						<td><div class="botaose botaoselect" id="collapseSelect">
							<div class="iconssele">
								<i class="fa fa-check-square-o fa-2x"></i>
							</div>	
							<p>SELECIONAR</p>
							</div>
						</td>
					</tr>
					
					</table></div>		
					<table>
						<td><a href="../page/consulta_cola.php">
							<div class="botao botaocola" id="limparCampos">
							<div class="iconsrela">
								<i class="fa fa-reply fa-2x"></i>
							</div>	
							<p>VOLTAR</p>
							</div>
						</a></td>
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