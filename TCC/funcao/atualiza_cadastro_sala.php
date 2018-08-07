<?php
	require_once("../config/config.php");
	
	$id_sala=$_POST["id_sala"];
	$nr_sala=$_POST["nr_sala"];
	$bloco_sala=$_POST["bloco_sala"];
	
	$id_cons=$_POST["id_cons"];
	
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="UPDATE sala SET nr_sala=?,bloco_sala=? WHERE id_sala=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($nr_sala, $bloco_sala,$id_sala));
		if($id_cons!=0){
				date_default_timezone_set('America/Sao_Paulo');
				$dt_relsala = date("Y/m/d");
				$hr_relsala = date("H:i:s");
				$sql="INSERT INTO consultor_cad_sala SET sala_id_sala=?,consultor_id_cons=?,dt_relsala=?,hr_relsala=?,tipo_relsala=2";
				$q=$pdo->prepare($sql);
				$q->execute(array($id_sala,$id_cons,$dt_relsala,$hr_relsala));
		}
		Database::disconnect();
		header("Location:../page/consulta_sala.php?sucess=1");
?>