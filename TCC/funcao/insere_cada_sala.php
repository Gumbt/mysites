<?php
	require_once("../config/config.php");

	if(!empty($_POST)){
		$nr_sala=$_POST["nr_sala"];
		$bloco_sala=$_POST["bloco_sala"];
		$id_cons=$_POST["id_cons"];
		
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO sala (nr_sala,bloco_sala) values(?,?)";
		$q=$pdo->prepare($sql);
		$q->execute(array($nr_sala, $bloco_sala));
		
		$sql22="SELECT id_sala FROM sala ORDER BY id_sala DESC LIMIT 1 ";
		foreach($pdo->query($sql22) as $row)
		{
			$id_sala=$row['id_sala'];
		}

		
		if($id_cons!=0){
			date_default_timezone_set('America/Sao_Paulo');
			$dt_relsala = date("Y/m/d");
			$hr_relsala = date("H:i:s");
			$sql="INSERT INTO consultor_cad_sala SET sala_id_sala=?,consultor_id_cons=?,dt_relsala=?,hr_relsala=?,tipo_relsala=1";
			$q=$pdo->prepare($sql);
			$q->execute(array($id_sala,$id_cons,$dt_relsala,$hr_relsala));
		}
		
		Database::disconnect();
		header("Location:../index.php?sucesso=3");
	}

?>