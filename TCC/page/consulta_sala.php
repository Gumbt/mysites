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
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
    <title>Consulta de sala</title>
        <link rel="stylesheet" href="../css/EstiloAll.css">
		 <link rel="stylesheet" href="../css/EstiloPages.css">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
				</div><?php } ?>
		</header>
		<a href="../funcao/logout.php"><div id="logoutr"><h6><i class="fa fa-sign-out fa-2x">LOGOUT</i></h6></div></a>
		<div id="login">
			<h1>Consulta</h1>
			<div id="triangle"></div>
		</div>

		<?php
	require_once("../config/config.php");
	$pdo = Database::connect();
	$sucess = null;
	if(!empty($_GET["sucess"]))
	{
	print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspSala atualizada com sucesso!!</h4>
			<a href="consulta_sala.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
	
	$pdo = Database::disconnect();
	?>
<script>
$(function(){
    $(".input-search").keyup(function(){
        //pega o css da tabela 
        var tabela = $(this).attr('alt');
        if( $(this).val() != ""){
            $("."+tabela+" tbody>tr").hide();
            $("."+tabela+" td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        } else{
            $("."+tabela+" tbody>tr").show();
        }
    }); 
});
$.extend($.expr[":"], {
    "contains-ci": function(elem, i, match, array) {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});

</script>
	<div class="mid">
			<?php
	require_once("../config/config.php");
	$pdo = Database::connect();
	$id = null;
	if(!empty($_GET["id"]))
	{
		$id = $_GET["id"];
		$sql2 = "SELECT * FROM sala WHERE id_sala=?";
		$q = $pdo->prepare($sql2);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$id_sala = $data["id_sala"];
		$nr_sala = $data["nr_sala"];
		$bloco_sala = $data["bloco_sala"];
		
		print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h4>&nbsp&nbspTem certeza que deseja excluir a sala <h3 style="color:red;">'.$bloco_sala. ' '.$nr_sala . '</h3></h4>
				
			<a href="../funcao/delete_sala.php?id='.$id_sala;
			if($verifica!="admin"){
			echo '&gestor='.$id_cons;
			}
			
		print '"><div class="botaose2 botaoselect10" style="margin-top:60px;" id="collapseSaveSelect">
					<div class="iconssele">
						<i class="fa fa-check fa-2x"></i>
					</div>	
					<p>SIM</p>
			</div>	
			<a href="consulta_sala.php"><div style="margin-top:60px;" class="botaose2 botaoselect2">
					<div class="iconssele">
						<i class="fa fa-times fa-2x"></i>
					</div>	
					<p>NÃO</p>
			</div></a>	
			</div>
			<div class="subpageselect">		
			</div>
		</div>';
	}
	$deleted = null;
	if(!empty($_GET["deleted"]))
	{
	print '<div id="subpage">
			<div class="pageexclui" style="text-align:center;margin: 100px auto;">
			<br>
				<h3>&nbsp&nbspSala excluida com sucesso!!</h4>
			<a href="consulta_sala.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
	
	$pdo = Database::disconnect();
	?>
	

				<div id="alinhamento" class="sidebar-search">
				<br>
				<br>
				</div>
				<div class="midpage">
						<h2>Consultar Sala</h2>					
					<br>
					<div class="vizuprocura2">
	
					<table class="vizualizarcliente2">
					<tr> <!-- linha -->
						<input type="search" class="input-search" alt="lista-clientes" name="proucura" placeholder="Buscar">
					</tr>
					<tr> <!-- linha -->
								<td><center>ID</center></td> <!-- coluna -->
								<td><center>Nome/Número</center></td>
								<td><center>Bloco</center></td>
								<td><center>Configuração</center></td>
					</tr>
					</table>
					<div class="divvizualizar2">				
						<table class="vizualizarcliente lista-clientes">
							<?php
							require_once("../config/config.php");
							$pdo = Database::connect();
							$totalrow=1;
							$sql = "SELECT * FROM sala ORDER BY id_sala";
							foreach($pdo->query($sql) as $row)
							{
								$totalrow++;
							}
							$rowrela= $totalrow;
							if($totalrow>1){
								foreach($pdo->query($sql) as $row)
								{
									echo "<tr>";
									echo "<td><center>".$row["id_sala"]."</center></td>";
									echo "<td><center>".$row["nr_sala"]."</center></td>";
									echo "<td><center>".$row["bloco_sala"]."</center></td>";
									echo "<td width='250'> <center>";
									echo "<a class='but-edit' href='edicao_sala.php?id=".$row["id_sala"]."'><i class='fa fa-pencil-square-o fa-2x'></i></a>";
									echo "&nbsp&nbsp";
									
									
									echo "<a href='consulta_sala.php?id=".$row["id_sala"]."'><i class='fa fa-close fa-2x'></i></a>";			
									
									echo "</center></td>";
									echo "</tr>";							
								}
							}else{
								echo '<center><h4>Não existe salas cadastradas</h4></center>';
							}
								Database::disconnect();
							?>
				</table>
			</div>
		</div>
		
<br><br><br>
							<table>
					<td><a href="../index.php">
							<div class="botao botaovoltar">
							<div class="iconsrela">
								<i class="fa fa-reply fa-2x"></i>
							</div>	
							<p>VOLTAR</p>
							</div>
						</a></td>
			</table>	
					
					
					
					
					
				</div>
				

	</div>
					
  </body>
</html>
<?php 
}else{
header("Location:../login.php?logout=1");
}

?>