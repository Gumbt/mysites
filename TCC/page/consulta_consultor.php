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
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
    <title>Consulta de Gestor</title>
        <link rel="stylesheet" href="../css/EstiloAll.css">
		 <link rel="stylesheet" href="../css/EstiloPages.css">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
				<h3>&nbsp&nbspGestor atualizado com sucesso!!</h3>
			<a href="consulta_consultor.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
	$falha = null;
	if(!empty($_GET["falha"]))
	{
	$falha = $_GET["falha"];
	if($falha==1){
		print '<div id="subpage">
				<div class="pageexclui" style="text-align:center;margin: 100px auto;">
				<br>
					<h3>&nbsp&nbspFalha ao atualizar o gestor!!</h3>
					<h3>&nbsp&nbspO RFid, CPF ou Login ja existem!!</h3>
				<a href="consulta_consultor.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
					<h3>&nbsp&nbspFalha ao atualizar o gestor!!</h3>
					<h3>&nbsp&nbspO login "admin" não está disponivel!!</h3>
				<a href="consulta_consultor.php"><div style="margin-right: 130px;margin-top:60px;" class="botaose2 botaoselect2">
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
				<div id="alinhamento" class="sidebar-search">
				<br>
				<br>
				</div>
				<div class="midpage">
						<h2>Consultar Gestores</h2>					
					<br>
					<div class="vizuprocura">

						<input type="search" name="proucura" class="input-search" alt="lista-clientes" placeholder="Buscar">

					<table class="vizualizarcliente2">
					
					<tr> <!-- linha -->
								<td><center>Código</center></td> <!-- coluna -->
								<td><center>Nome</center></td>
								<td><center>Telefone</center></td>
								<td><center>Login</center></td>
								<td><center>CPF</center></td>
								<td><center>Configuração</center></td>
					</tr>
					</table>
					<div class="divvizualizar">				
						<table class="vizualizarcliente lista-clientes">
					<?php
						require_once("../config/config.php");
						$pdo = Database::connect();
						$totalrow=1;
						$sql = "SELECT * FROM consultor ORDER BY id_cons";
						foreach($pdo->query($sql) as $row)
						{
							$totalrow++;
						}
						$rowrela= $totalrow;
						if($totalrow>1){
							foreach($pdo->query($sql) as $row)
							{
								echo "<tr>";
								echo "<td><center>".$row["id_cons"]."</center></td>";
								echo "<td><center>".$row["nome_cons"];
								if(strlen($row["snome_cons"])<16){
								echo " ".$row["snome_cons"]."</center></td>";
								}else{
								echo "</center></td>";
								}	
								
								echo "<td><center>".$row["tel_cons"]."</center></td>";
								echo "<td><center>".$row["login_cons"]."</center></td>";
								echo "<td><center>".$row["cpf_cons"]."</center></td>";
								echo "<td width='250'> <center>";
								echo "<a href='relatorio_consultor.php?id=".$row["id_cons"]."'><i class='fa fa-eye fa-2x'></i></a>";
								echo "&nbsp&nbsp";
								echo "<a class='but-edit' href='edicao_consultor.php?id=".$row["id_cons"]."'><i class='fa fa-pencil-square-o fa-2x'></i></a>";
								echo "&nbsp&nbsp";
								if($row["status_cons"]=='ativo'){
									echo "<a class='but-delete'><i class='fa fa-unlock-alt fa-2x'></i></a>";
								}else{
									echo "<a class='but-delete'><i class='fa fa-lock fa-2x'></i></a>";
								}
									echo "</center></td>";
									echo "</tr>";
								}
							}else{
								echo '<center><h4>Não existe gestores cadastrados</h4></center>';
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