<?php
	require_once("../config/config.php");
	
	$id_colab=$_POST["id_colab"];
	$nome_colab=$_POST["nome_colab"];
	$snome_colab=$_POST["snome_colab"];
	$email_colab=$_POST["email_colab"];
	$tel_colab=$_POST["tel_colab"];
	$end_colab=$_POST["end_colab"];
	$cep_colab=$_POST["cep_colab"];
	$status_colab=$_POST["status_colab"];
	$cpf_colab=$_POST["cpf_colab"];
	$rfid_colab=$_POST["rfid_colab"];
	
	$rfid_atual=$_POST["rfid_atual"];
	$cpf_atual=$_POST["cpf_atual"];
	
	$id_cons=$_POST["id_cons"];
	
$pdo=Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$totalrow=1;
	if($rfid_atual!=$rfid_colab)//verifica se ja existe o rfid
	{	
		$sqlv = "SELECT rfid_colab FROM colaborador WHERE  rfid_colab='$rfid_colab'";//verificaçao
		foreach($pdo->query($sqlv) as $row)
		{
			$totalrow++;
		}
		$sqlv2 = "SELECT rfid_cons FROM consultor WHERE rfid_cons='$rfid_colab'";//verificaçao
		foreach($pdo->query($sqlv2) as $row)
		{
			$totalrow++;
		}
	}
$totalrow2=1;
	if($cpf_atual!=$cpf_colab)//verifica se ja existe o cpf
	{
		$sqlv = "SELECT cpf_colab FROM colaborador WHERE  cpf_colab='$cpf_colab'";//verificaçao
		foreach($pdo->query($sqlv) as $row)
		{
			$totalrow2++;
		}
		$sqlv2 = "SELECT cpf_cons FROM consultor WHERE cpf_cons='$cpf_colab'";//verificaçao
		foreach($pdo->query($sqlv2) as $row)
		{
			$totalrow2++;
		}
	}
	if($totalrow==1 && $totalrow2==1){
		$sql="UPDATE colaborador SET nome_colab=?,snome_colab=?,email_colab=?,tel_colab=?,end_colab=?,cep_colab=?,status_colab=?,cpf_colab=?,rfid_colab=? WHERE id_colab=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome_colab,$snome_colab,$email_colab,$tel_colab,$end_colab,$cep_colab,$status_colab,$cpf_colab,$rfid_colab,$id_colab));
		
			if($id_cons!=0){
				date_default_timezone_set('America/Sao_Paulo');
				$dt_relcolab = date("Y/m/d");
				$hr_relcolab = date("H:i:s");
				$sql="INSERT INTO consultor_cad_colab SET colaborador_id_colab=?,consultor_id_cons=?,dt_relcolab=?,hr_relcolab=?,tipo_relcolab=2";
				$q=$pdo->prepare($sql);
				$q->execute(array($id_colab,$id_cons,$dt_relcolab,$hr_relcolab));
			}
		
		$sql3 = "DELETE FROM colaborador_has_sala WHERE colaborador_id_colab=?";
		$q = $pdo->prepare($sql3);
		$q->execute(array($id_colab));
		
		if($id_colab>0){
		$ListaSalas = $_POST['salas_colab'];
			foreach ($ListaSalas as $salas_colab) {
				$sql="INSERT INTO colaborador_has_sala (colaborador_id_colab,sala_id_sala) values(?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($id_colab,$salas_colab));		
			}
		}
		Database::disconnect();
		header("Location:../page/consulta_cola.php?sucess=1");
	}else{
		header("Location:../page/consulta_cola.php?falha=1");
	}
?>