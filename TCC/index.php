<?php
session_start();
$verifica=$_SESSION["login"];
if(!empty($verifica))
{
	require_once("config/config.php");
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
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
    <title>Pagina Inicial</title>
        <link rel="stylesheet" href="css/EstiloAll.css">
		<link rel="stylesheet" href="css/EstiloPages.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body>
		
		
	<?php if($_SESSION["login"]=='admin'){
		print '<header>
				<div class="menu">
					<ul>
						<li><a href="index.php">INíCIO</a></li>
						<li>
							<a href="#">CADASTROS</a>
							<ul>
								<li><a href="index.php?colaborador=1">Colaborador</a> </li>
								<li><a href="index.php?consultor=1">Gestor</a> </li>
								<li><a href="index.php?sala=1">Salas</a></li>						
							</ul>
						</li>
						<li>
							<a href="#">CONSULTAR</a>
							<ul>
								<li><a href="page/consulta_cola.php">Colaborador</a> </li>
								<li><a href="page/consulta_consultor.php">Gestor</a> </li>
								<li><a href="page/consulta_sala.php">Sala</a></li>						
							</ul>
						</li>
					</ul>
				</div>
		</header>';}?>
	<a href="funcao/logout.php"><div id="logoutr"><h6><i class="fa fa-sign-out fa-2x">LOGOUT</i></h6></div></a>
		<div id="login">
			<h1>Pagina Inicial</h1>
			<div id="triangle2" style="margin-top:-10px;"></div>
			
		</div>
		
<?php
	require_once("config/config.php");
	$pdo = Database::connect();
	$sucesso = null;
	if(!empty($_GET["sucesso"]))
	{
		$sucesso = $_GET["sucesso"];
		if($sucesso==1){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspColaborador cadastrado com sucesso!!</h3>
			<a href="index.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
		if($sucesso==2){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspGestor cadastrado com sucesso!!</h3>
			<a href="index.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
		if($sucesso==3){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspSala cadastrada com sucesso!!</h3>
			<a href="index.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
				<h3>&nbsp&nbspColaborador <span style="color:red;">NÃO</span> foi cadastrado com sucesso!!</h3>
				<h3>&nbsp&nbspO RFid ou CPF ja existem!!</h3>
			<a href="index.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
				<h3>&nbsp&nbspGestor <span style="color:red;">NÃO</span> foi cadastrado com sucesso!!</h4>
				<h3>&nbsp&nbspO RFid ou CPF ja existem!!</h4>
			<a href="index.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
		if($falha==3){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspGestor <span style="color:red;">NÃO</span> foi cadastrado com sucesso!!</h4>
				<h3>&nbsp&nbspO login "admin" não está disponivel!!</h4>
			<a href="index.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
		if($falha==4){
			print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspColaborador <span style="color:red;">NÃO</span> foi cadastrado com sucesso!!</h3>
				<h3>&nbsp&nbspO RFid, CPF ou Login ja existem!!</h3>
			<a href="index.php"><div style="margin-right: 130px;margin-top:30px;" class="botaose2 botaoselect2">
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
	
<script>
	
$(document).ready(function() {
        $('#collapseCada').click(function() {
				$("#cadsala").hide();
				$("#divconsul").hide();
				$("#cadconsultor").hide();
                $('#cadcolaborador').slideToggle("medium");
        });
    });
	
	$(document).ready(function() {
        $('#collapseCadaConsul').click(function() {
				$("#cadsala").hide();
				$("#divconsul").hide();
				$("#cadcolaborador").hide();
                $('#cadconsultor').slideToggle("medium");
        });
    });
	

	$(document).ready(function() {
        $('#collapseSala').click(function() {
				$("#cadcolaborador").hide();
				$("#cadconsultor").hide();
				$("#divconsul").hide();
				
				
                $('#cadsala').slideToggle("medium");
        });
    });


	$(document).ready(function() {
	$('#collapseConsul').on('click', function(){
		$("#cadcolaborador").hide();
		$("#cadsala").hide();
		$("#cadconsultor").hide();
		$('#divconsul').slideToggle("medium");
			
	});
});




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
						<h2>Bem Vindo</h2>
						<table>
						<td>
						
							<div class="botao botao1" id="collapseCada">
							<div class="icons">
								<i class="fa fa-plus-circle fa-2x"></i>
							</div>
								<p>CADASTRAR COLABORADOR</p>
							</div>
						</td>
						<?php if($_SESSION["login"]=='admin'){?>
						<td>
							<div class="botao botao3" id="collapseCadaConsul">
							<div class="icons">
								<i class="fa fa-plus-circle fa-2x"></i>
							</div>	
							<p>CADASTRAR <br> GESTOR</p>
							</div>
						</td><?php } ?>	
						<td>
							<div class="botao botao2" id="collapseSala">
							<div class="icons">
								<i class="fa fa-plus-circle fa-2x"></i>
							</div>
								<p>CADASTRAR SALA</p>
							</div>
						</td>					
						<td>
							<div class="botao botao4" id="collapseConsul">
							<div class="icons">
								<i class="fa fa-search fa-2x"></i>
							</div>	
							<p>CONSULTAR</p>
							</div>
							<div id="divconsul" <?php if($_SESSION["login"]!='admin'){echo 'style="margin: 0 auto;float: none;"';}?>class="toggle">
						<table>
						<tr><td><a href="page/consulta_cola.php">
							<div class="botao botaocola">
							<div class="iconsrela">
								<i class="fa fa-users fa-2x"></i>
							</div>	
							<p>COLABORADOR</p>
							</div>
						</a></td></tr>
						<?php if($_SESSION["login"]=='admin'){?>
						<tr><td><a href="page/consulta_consultor.php">
							<div class="botao botaocola">
							<div class="iconsrela">
								<i class="fa fa-users fa-2x"></i>
							</div>	
							<p>GESTOR</p>
							</div>
						</a></td></tr><?php } ?>
						<tr><td><a href="page/consulta_sala.php">
							<div class="botao botaocola">
							<div class="iconsrela">
								<i class="fa fa-th fa-2x"></i>
							</div>	
							<p>SALA</p>
							</div>
						</a></td></tr>
						</table>
				</div>
						</td>
						</table>
					</div>
	<script>		
	
	function myFunction() {
	
		document.getElementById("myForm").reset();
	}
	
	</script>	
			<!--cadastro colaborador-->
			<div id="subpage" class="toggle">
			<div class="pageselect">
				<h4>&nbsp&nbspSalas cadastradas (Bloco / Sala):</h4>
				<div class="checklist">
				<form id='myForm' action='funcao/insere_cada_cola.php' method='POST' >
				<?php if($verifica!="admin"){
				echo '<input name="id_cons" type="hidden" value="'.$id_cons.'">';
				}else{
				echo '<input name="id_cons" type="hidden" value="0">';
				}
				?>
				
				<?php 		
					//AQUI ABRE A CONEXÃO COM BANCO
					require_once("config/config.php");
					$pdo = Database::connect();
					$sql = "SELECT nr_sala, bloco_sala, id_sala FROM sala ORDER BY bloco_sala ASC";
					foreach($pdo->query($sql) as $row)
					{
				?>		
						<input type="checkbox" name="salas_colab[]" value="<?php echo $row["id_sala"]; ?>" ><?php echo $row["bloco_sala"] . " " . $row["nr_sala"]; ?><br>
				<?php	}
						Database::disconnect();	
						//AQUI CONSULTA OS DADOS D0 ESTADO
				?>	
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
				<div id="cadcolaborador" <?php if(!empty($_GET["colaborador"])){echo '';}else{echo "class='toggle'";}?>>
				
					<center><h2>CADASTRO DE COLABORADOR</h2></center><br>
					<div class="cada1">
					
					<table>					
					<tr>
						<td>Nome*:</td>
						<td><input name="nome_colab" type="text" size="30" minlength="2" maxlength="50" pattern="[A-Za-z]{2,}" title="Somente letras" required></td>
					</tr>
					<tr>
						<td>Sobrenome*:</td>
						<td><input name="snome_colab" type="text" size="30" minlength="2" maxlength="50" pattern="[A-Za-z]+[ A-Za-z]{2,}" title="Somente letras"  required></td>
					</tr>
					<tr>
						<td>Email*:</td>
						<td><input name="email_colab" type="email" size="30" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="exemplo@exemplo.com" title="exemplo@exemplo.com" required></td>
					</tr>
					<tr>
						<td>Telefone*:</td>
						<td><input name="tel_colab" type="text" pattern="\d*" minlength="11" maxlength="12" placeholder="DDD12345678" title="DDD+8 ou 9 números" required></td>
					</tr>
					<tr>
						<td>Endereço*:</td>
						<td><input name="end_colab" type="text" size="30" minlength="2" maxlength="50" pattern="[A-Za-z]+[A-Za-z, 0-9]{2,}" title="Nome da rua, número da casa" required></td>
					</tr>					
					</table></div>
					<div class="cada2"><table>
					<tr>
						<td>CEP*:</td>
						<td><input name="cep_colab" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" placeholder="01234567891" required></td>
					</tr>
					<tr style="height:35px;">
						<td>Status:</td>
						<td style="text-align:center;">
						  &nbsp&nbsp <input type="radio" name="status_colab" value="ativo" checked>Ativo &nbsp&nbsp
						  <input type="radio" name="status_colab" value="inativo">Inativo
						</td>
					</tr>
					<tr>
						<td>CPF*:</td>
						<td><input name="cpf_colab" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" placeholder="01234567891" maxlength="50" required></td>
					</tr>					
					<tr>
						<td>ID*:</td>
						<td><input name="rfid_colab" type="text" size="30" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}" title="XX-YY-ZZ-WW" maxlength="11" required></td>
					</tr>
					<tr>
						<td>Salas:</td>
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
						<td><a onclick="myFunction()">
							<div class="botao botaocola" id="limparCampos">
							<div class="iconsrela">
								<i class="fa fa-eraser fa-2x"></i>
							</div>	
							<p>LIMPAR</p>
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
				
	<script>
	function myFunction2() {
	
		document.getElementById("myForm2").reset();
	}	
	
	
$(document).ready(function() {
	$('#collapseSelect2').on('click', function(){
		$("#subpage2").show(500);	
	});
});

$(document).ready(function() {
        $('#collapseSaveSelect2').click(function() {
				$("#subpage2").hide(500);
        });
    });
	

	</script>			
				
			<!--cadastro consultor-->
		<div id="subpage2" class="toggle">
			<div class="pageselect">
				<h4>&nbsp&nbspSalas cadastradas (Bloco / Sala):</h4>
				<div class="checklist">
				<form id='myForm2' action='funcao/insere_cada_consultor.php' method='POST'>
				<?php 		
					//AQUI ABRE A CONEXÃO COM BANCO
					require_once("config/config.php");
					$pdo = Database::connect();
					$sql = "SELECT nr_sala, bloco_sala, id_sala FROM sala ORDER BY bloco_sala ASC";
					foreach($pdo->query($sql) as $row)
					{
				?>		
						<input type="checkbox" name="salas_cons[]" value="<?php echo $row["id_sala"]; ?>" ><?php echo $row["bloco_sala"] . " " . $row["nr_sala"]; ?><br>
				<?php	}
						Database::disconnect();	
						//AQUI CONSULTA OS DADOS D0 ESTADO
				?>	
				</div>
				<div class="botaose2 botaoselect2" id="collapseSaveSelect2">
					<div class="iconssele">
						<i class="fa fa-floppy-o fa-2x"></i>
					</div>	
					<p>SALVAR</p>
				</div>
			
			</div>
			<div class="subpageselect">		
			</div>
		</div>
				<div id="cadconsultor" <?php if(!empty($_GET["consultor"])){echo '';}else{echo "class='toggle'";}?>>
				
					<center><h2>CADASTRO DE GESTOR</h2></center><br>
					<div class="cada1">
					
					<table>					
					<tr>
						<td>Nome*:</td>
						<td><input name="nome_cons" pattern="[A-Za-z]{2,}" title="Somente letras" type="text" size="30" minlength="2" maxlength="30" required></td>
					</tr>
					<tr>
						<td>Sobrenome*:</td>
						<td><input name="snome_cons" pattern="[A-Za-z]+[ A-Za-z]{2,}" title="Somente letras" type="text" size="30" minlength="2" maxlength="30" required></td>
					</tr>
					<tr>
						<td>Email*:</td>
						<td><input name="email_cons" type="email" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="exemplo@exemplo.com" title="exemplo@exemplo.com" required></td>
					</tr>
					<tr>
						<td>Telefone*:</td>
						<td><input name="tel_cons" type="text" pattern="\d*" minlength="11" maxlength="12" placeholder="DDD12345678" title="DDD+8 ou 9 números" size="30" required></td>
					</tr>
					<tr>
						<td>Endereço*:</td>
						<td><input name="end_cons" type="text" size="30" pattern="[A-Za-z]+[A-Za-z, 0-9]{2,}" title="Nome da rua, número da casa" minlength="2" maxlength="50" required></td>
					</tr>					
					</table></div>
					<div class="cada2"><table>
					<tr>
						<td>CEP*:</td>
						<td><input name="cep_cons" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" placeholder="01234567891" required></td>
					</tr>
					<tr style="height:35px;">
						<td>Status:</td>
						<td style="text-align:center;">
						  &nbsp&nbsp <input type="radio" name="status_cons" value="ativo" checked>Ativo &nbsp&nbsp
						  <input type="radio" name="status_cons" value="inativo">Inativo
						</td>
					</tr>
					<tr>
						<td>CPF*:</td>
						<td><input name="cpf_cons" type="text" size="30" pattern="\d*" minlength="11" maxlength="11" title="11 digitos sem pontos" placeholder="01234567891" required></td>
					</tr>					
					<tr>
						<td>ID*:</td>
						<td><input name="rfid_cons" type="text" size="30" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}" title="XX-YY-ZZ-WW" minlength="2" maxlength="11" required></td>
					</tr>
					<tr>
						<td>Salas:</td>
						<td><div class="botaose botaoselect" id="collapseSelect2">
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
						<td><input name="login_cons" pattern="[A-Za-z]{2,}" placeholder="Usuário" title="Somente letras" type="text" size="30" minlength="2" maxlength="50" required></td>
						<td>Senha*:</td>
						<td><input name="senha_cons" type="password" size="30" minlength="2" maxlength="16" pattern="(?=.*\d)(?=.*[@,!,#,$,%,&])(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Sua senha deve conter pelo menos 6 digítos, um número [0-9], uma letra minúscula, uma maiúscula e um caractére especial [@,!,#,$,%,&]" required>
						</td>
						</tr>					
						</table>
					</div>						
					<table>
						<td><a onclick="myFunction2()">
							<div class="botao botaocola" id="limparCampos">
							<div class="iconsrela">
								<i class="fa fa-eraser fa-2x"></i>
							</div>	
							<p>LIMPAR</p>
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
				<script>
					function myFunction3() {
	
						document.getElementById("myForm3").reset();
					}	
				</script>
				<!--Cadastro sala-->
				<div id="cadsala" <?php if(!empty($_GET["sala"])){echo '';}else{echo "class='toggle'";}?>>
				<form id="myForm3" action="funcao/insere_cada_sala.php" method="POST">
				<?php if($verifica!="admin"){
				echo '<input name="id_cons" type="hidden" value="'.$id_cons.'">';
				}else{
				echo '<input name="id_cons" type="hidden" value="0">';
				}
				?>
					<center><h2>CADASTRO DE SALA</h2></center><br>
					<table>
					<tr>
						<td>Nome/Número da sala:</td>
						<td><input name="nr_sala" type="text" size="30" maxlength="50" required></td>
					</tr>
					<tr>
						<td>Bloco:</td>
						<td><select name="bloco_sala" style="width: 94%;" required>
						  <option value="">Selecione o bloco</option>
						  <option value="A">Bloco A</option>
						  <option value="B">Bloco B</option>
						  <option value="C">Bloco C</option>
						</select></td>
					</tr>					
					</table>
					<table>
						<td><a onclick="myFunction3()">
							<div class="botao botaocola" id="limparCampos">
							<div class="iconsrela">
								<i class="fa fa-eraser fa-2x"></i>
							</div>	
							<p>LIMPAR</p>
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
header("Location:login.php?logout=1");
}

?>