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
    <title>Relatório de Colaborador</title>
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
			<h1>Relatório</h1>
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
	
	
	
	
	Database::disconnect();

?>
				<div id="alinhamento" class="sidebar-search">
				<br>
				<br>
				</div>
					<div class="midpage">
				
				<div class="relacolaborador">
				
					<center><h3>INFORMAÇÕES BASICAS</h3></center><br>
					<div class="rela1">

						<p class="esquerda">Nome:&nbsp&nbsp <?php echo !empty($nome_colab)?$nome_colab." ":'';echo !empty($snome_colab)?$snome_colab:'';?></p>
						<input name="id_colab" type="hidden" value="<?php echo $id_colab;?>">

						<p class="esquerda">Email:&nbsp&nbsp<?php echo !empty($email_colab)?$email_colab:'';?></p>

						<p class="esquerda">Telefone:&nbsp&nbsp<?php echo !empty($tel_colab)?$tel_colab:'';?></p>

						<p class="esquerda">Endereço:&nbsp&nbsp<?php echo !empty($end_colab)?$end_colab:'';?></p>
					</div>
					<div class="rela1">

						<p class="esquerda">CEP:&nbsp&nbsp<?php echo !empty($cep_colab)?$cep_colab:'';?></p>

						<p class="esquerda">Status:&nbsp&nbsp  <?php if($status_colab=="ativo"){echo 'Ativo';}else{echo 'Inativo';}?></p>

						<p class="esquerda">CPF:&nbsp&nbsp<?php echo !empty($cpf_colab)?$cpf_colab:'';?></p>

						<p class="esquerda">ID:&nbsp&nbsp<?php echo !empty($rfid_colab)?$rfid_colab:'';?></p>
					</div>
					<br><br><br>
					<p class="esquerda" style="margin-top: 40px;">Salas de acesso:
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
						$limitador = 0;
							foreach($pdo->query($sql) as $row)
							{
								if(!empty($vetorsala)){
									if (in_array($row["id_sala"], $vetorsala))
									{
										echo $row["bloco_sala"]. " ".$row["nr_sala"]. "; ";
										$limitador++;
										if($limitador==7){//quebra de linha das salas
										$limitador=0;
										echo "<br>";
										}
									}else{echo '';}
									
								}
								
							}
	
					
						Database::disconnect();	
						
						//AQUI CONSULTA OS DADOS D0 ESTADO
				?></p>
								
				</div>
				<div class="relacolaborador">
				<center><h3>RELATÓRIOS DE ACESSO</h3></center><br>
				<div style="overflow:scroll;max-height: 250px;">
				<?php 
					require_once("../config/config.php");
					$pdo = Database::connect();
					
					$totalrow=1;
						$sql = "SELECT * FROM relatorio_colaborador WHERE colaborador_id_colab='$id_colab' ORDER BY id_relcolab DESC";
					foreach($pdo->query($sql) as $row)
					{
						$totalrow++;
					}
					$rowrela= $totalrow;
					if($totalrow>1){
					foreach($pdo->query($sql) as $row)
					{
						$sql1 = "SELECT * FROM sala WHERE id_sala=?";
						$q = $pdo->prepare($sql1);
						$q->execute(array($row["sala_id_sala"]));
						$data = $q->fetch(PDO::FETCH_ASSOC);
						$nr_sala = $data["nr_sala"];
						$bloco_sala = $data["bloco_sala"];
						$rowrela--;
		?>
				<p class="esquerda"><span style="color:red;"> Relatório <?php echo $rowrela;?>:</span> O colaborador <strong><?php echo !empty($nome_colab)?$nome_colab." ":'';echo !empty($snome_colab)?$snome_colab:'';?></strong>, acessou a sala <strong><?php echo !empty($nr_sala)?$nr_sala." ":'<span style="color:red;">sala excluida</span>';?></strong> localizada no bloco <strong><?php echo !empty($bloco_sala)?$bloco_sala." ":'';?></strong> às <strong><?php echo !empty($row["hr_relcolab"])?$row["hr_relcolab"]." ":'';?></strong> na data <strong><?php echo !empty($row["dt_relcolab"])?$row["dt_relcolab"]." ":'';?></strong>.</p><br><br>
				<?php } }else{
				echo '<center><h4>Esse usuario não tem relatórios disponiveis</h4></center>';
				}
				Database::disconnect();
				?>
				</div>
				</div>
				<center><a href="../page/consulta_cola.php">
							<div class="botao botaocola" id="limparCampos">
							<div class="iconsrela">
								<i class="fa fa-reply fa-2x"></i>
							</div>	
							<p>VOLTAR</p>
							</div>
						</a></center>
				
	</div>
					
  </body>
</html>
<?php 
}else{
header("Location:../login.php?logout=1");
}

?>