<?php
	require_once("../config/config.php");
	
	$pdo = Database::connect();
	$id = null;
	$id_cons = null;
	if(!empty($_GET["id"]))
	{
		$id = $_GET["id"];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		
			if(!empty($_GET["gestor"]))
			{
				$id_cons = $_GET["gestor"];
				if($id_cons!=0){
				date_default_timezone_set('America/Sao_Paulo');
				$dt_relsala = date("Y/m/d");
				$hr_relsala = date("H:i:s");
				$sql="INSERT INTO consultor_cad_sala SET sala_id_sala=?,consultor_id_cons=?,dt_relsala=?,hr_relsala=?,tipo_relsala=3";
				$q=$pdo->prepare($sql);
				$q->execute(array(0,$id_cons,$dt_relsala,$hr_relsala));
				}
			}		
		$sql = "DELETE FROM sala WHERE id_sala=?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$sql2 = "DELETE FROM sala_has_consultor WHERE sala_id_sala=?";
		$q = $pdo->prepare($sql2);
		$q->execute(array($id));
		$sql3 = "DELETE FROM colaborador_has_sala WHERE sala_id_sala=?";
		$q = $pdo->prepare($sql3);
		$q->execute(array($id));
		Database::disconnect();
		header("Location:../page/consulta_Sala.php?deleted=1");
	}

?>
