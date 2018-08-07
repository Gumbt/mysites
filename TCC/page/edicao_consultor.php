<?php
session_start();
$verifica=$_SESSION["login"];	
	

if(!empty($verifica))
{


?>
<!DOCTYPE html>
<html>
	
  <head>
    <meta charset="UTF-8">
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.cookie.js"></script>
    <title>Edição de Gestor</title>
        <link rel="stylesheet" href="../css/EstiloAll.css">
		<link rel="stylesheet" href="../css/EstiloPages.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>
		
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
		</header>
		
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
	$sql = "SELECT * FROM consultor WHERE id_cons=?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
	$id_cons = $data["id_cons"];
	$nome_cons = $data["nome_cons"];
	$snome_cons = $data["snome_cons"];
	$email_cons = $data["email_cons"];
	$end_cons = $data["end_cons"];
	$cep_cons = $data["cep_cons"];
	$cpf_cons = $data["cpf_cons"];
	$status_cons = $data["status_cons"];
	$tel_cons = $data["tel_cons"];		
	$login_cons = $data["login_cons"];		
	$senha_cons = $data["senha_cons"];		
	$rfid_cons = $data["rfid_cons"];
	
	$rfid_atual = $data["rfid_cons"];
	$cpf_atual = $data["cpf_cons"];
	$login_atual = $data["login_cons"];
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
				<form id='myForm2' action='../funcao/atualiza_cadastro_consultor.php' method='POST'>
				<div style="text-align: left;">
				<?php 		
					//AQUI ABRE A CONEXÃO COM BANCO
					require_once("../config/config.php");
					$pdo = Database::connect();
					
					$sql2 = "SELECT * FROM sala_has_consultor WHERE consultor_id_cons='$id'";					
					foreach($pdo->query($sql2) as $row)
					{
						$vetorsala[] = $row["sala_id_sala"];
					}
					
						$sql = "SELECT nr_sala, bloco_sala, id_sala FROM sala ORDER BY bloco_sala ASC";
							foreach($pdo->query($sql) as $row)
							{
						?>		
							<input type="checkbox" name="salas_cons[]" value="<?php echo $row["id_sala"]; ?>" <?php 
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
				<div id="cadconsultor">
				
					<center><h2>EDIÇÃO DE GESTOR</h2></center><br>
					<div class="cada1">
					
					<input name="rfid_atual" type="hidden" value="<?php echo $rfid_atual;?>">
					<input name="cpf_atual" type="hidden" value="<?php echo $cpf_atual;?>">
					<input name="login_atual" type="hidden" value="<?php echo $login_atual;?>">
					
					<table>					
					<tr>
						<td>Nome*:</td>
						<td><input name="nome_cons" pattern="[A-Za-z]{2,}" title="Somente letras" value="<?php echo !empty($nome_cons)?$nome_cons:'';?>" type="text" size="30" minlength="2" maxlength="30" required></td>
						<input name="id_cons" type="hidden" value="<?php echo $id_cons;?>">
					</tr>
					<tr>
						<td>Sobrenome*:</td>
						<td><input name="snome_cons" pattern="[A-Za-z]+[ A-Za-z]{2,}" title="Somente letras" value="<?php echo !empty($snome_cons)?$snome_cons:'';?>" type="text" size="30" minlength="2" maxlength="30" required></td>
					</tr>
					<tr>
						<td>Email*:</td>
						<td><input name="email_cons" value="<?php echo !empty($email_cons)?$email_cons:'';?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="exemplo@exemplo.com" type="email" size="30" maxlength="50" required></td>
					</tr>
					<tr>
						<td>Telefone*:</td>
						<td><input name="tel_cons" value="<?php echo !empty($tel_cons)?$tel_cons:'';?>" title="DDD+8 ou 9 números" size="30" type="text" pattern="\d*" minlength="11" maxlength="12" required></td>
					</tr>
					<tr>
						<td>Endereço*:</td>
						<td><input name="end_cons" pattern="[A-Za-z]+[A-Za-z, 0-9]{2,}" title="Nome da rua, número da casa" value="<?php echo !empty($end_cons)?$end_cons:'';?>" type="text" size="30" minlength="2" maxlength="50" required></td>
					</tr>					
					</table></div>
					<div class="cada2"><table>
					<tr>
						<td>CEP*:</td>
						<td><input name="cep_cons" value="<?php echo !empty($cep_cons)?$cep_cons:'';?>" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" required></td>
					</tr>
					<tr style="height:35px;">
						<td>Status:</td>
						<td style="text-align:center;">
						  &nbsp&nbsp <input type="radio" name="status_cons" value="ativo" <?php echo ($status_cons=="ativo")?'checked':'';?>>Ativo &nbsp&nbsp
						  <input type="radio" name="status_cons" value="inativo" <?php echo ($status_cons=="inativo")?'checked':'';?>>Inativo
						</td>
					</tr>
					<tr>
						<td>CPF*:</td>
						<td><input name="cpf_cons" value="<?php echo !empty($cpf_cons)?$cpf_cons:'';?>" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" required></td>
					</tr>					
					<tr>						
						<td>ID*:</td>
						<td><input name="rfid_cons" value="<?php echo !empty($rfid_cons)?$rfid_cons:'';?>" type="text" size="30" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}" title="XX-YY-ZZ-WW" maxlength="11" required></td>					
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
					<div id="loginConsul" class="toggle">
						<table>
						<tr>
						<td>Login*:</td>
						<td><input name="login_cons" value="<?php echo !empty($login_cons)?$login_cons:'';?>" pattern="[A-Za-z]{2,}" title="Somente letras" type="text" size="30" maxlength="50" required></td>
						<td>Senha*:</td>
						<td><input name="senha_cons" value="<?php echo !empty($senha_cons)?$senha_cons:'';?>" pattern="(?=.*\d)(?=.*[@,!,#,$,%,&])(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Sua senha deve conter pelo menos 6 digítos, um número [0-9], uma letra minúscula, uma maiúscula e um caractére especial [@,!,#,$,%,&]" type="password" size="30" maxlength="50" required>
						</td>
						</tr>					
						</table>
					</div>						
					<table>
						<td><a href="../page/consulta_consultor.php">
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