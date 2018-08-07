
<?php
	require_once("../config/config.php");

	if(!empty($_POST)){		
		$salas_colab=$_POST["salas_colab"];
		$rfid_total=$_POST["rfid_total"];
		
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		

		$sql1 = "SELECT id_colab,status_colab FROM colaborador WHERE rfid_colab=?";
		$q = $pdo->prepare($sql1);
		$q->execute(array($rfid_total));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$id_colab = $data["id_colab"];
		$status_colab = $data["status_colab"];

		$sql1 = "SELECT id_cons,status_cons FROM consultor WHERE rfid_cons=?";
		$q = $pdo->prepare($sql1);
		$q->execute(array($rfid_total));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$id_cons = $data["id_cons"];
		$status_cons = $data["status_cons"];
		
		$verif=0;
		if($id_cons!=null){
			if($status_cons=='ativo'){
				$sql3 = "SELECT consultor_id_cons FROM sala_has_consultor WHERE consultor_id_cons='$id_cons' AND sala_id_sala='$salas_colab'";
				foreach($pdo->query($sql3) as $row)
				{
					if($row["consultor_id_cons"]==$id_cons){
						
						date_default_timezone_set('America/Sao_Paulo');
						$dt_relcons = date("Y/m/d");
						$hr_relcons = date("H:i:s");
						
						$sql="INSERT INTO relatorio_consultor SET consultor_id_cons=?,sala_id_sala=?,dt_relcons=?,hr_relcons=?";
						$q=$pdo->prepare($sql);
						$q->execute(array($id_cons,$salas_colab,$dt_relcons,$hr_relcons));
						$verif=1;
					}								
				}		
			}else{
				$falha=2;
			}
		}
		
		
		
		if($id_colab!=null){
			if($status_colab=='ativo'){
				$sql3 = "SELECT colaborador_id_colab FROM colaborador_has_sala WHERE colaborador_id_colab='$id_colab' AND sala_id_sala='$salas_colab'";
				foreach($pdo->query($sql3) as $row)
				{
					if($row["colaborador_id_colab"]==$id_colab){
					date_default_timezone_set('America/Sao_Paulo');
					$dt_relcolab = date("Y/m/d");
					$hr_relcolab = date("H:i:s");
					
					$sql="INSERT INTO relatorio_colaborador SET colaborador_id_colab=?,sala_id_sala=?,dt_relcolab=?,hr_relcolab=?";
					$q=$pdo->prepare($sql);
					$q->execute(array($id_colab,$salas_colab,$dt_relcolab,$hr_relcolab));
					$verif=1;
					}								
				}		

			}else{
				$falha=2;
			}
		}
		


		Database::disconnect();
		if($falha!=2){
			if($verif==1){
			header("Location:../arduino/arduino.php?sucesso=1");	
			}else{
			header("Location:../arduino/arduino.php?falha=1");
			}
		}else{		
			header("Location:../arduino/arduino.php?falha=2");
		}
	
	}
 
?>