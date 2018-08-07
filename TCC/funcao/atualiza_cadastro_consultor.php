<?php
	require_once("../config/config.php");
	
	$id_cons=$_POST["id_cons"];
	$nome_cons=$_POST["nome_cons"];
	$snome_cons=$_POST["snome_cons"];
	$email_cons=$_POST["email_cons"];
	$tel_cons=$_POST["tel_cons"];
	$end_cons=$_POST["end_cons"];
	$cep_cons=$_POST["cep_cons"];
	$status_cons=$_POST["status_cons"];
	$cpf_cons=$_POST["cpf_cons"];
	$rfid_cons=$_POST["rfid_cons"];
	$login_cons=$_POST["login_cons"];
	$senha_cons=$_POST["senha_cons"];
	
	
	$rfid_atual=$_POST["rfid_atual"];
	$login_atual=$_POST["login_atual"];
	$cpf_atual=$_POST["cpf_atual"];

	
$pdo=Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
if($login_cons!="admin"){
$totalrow3=1;
	if($login_atual!=$login_cons)//verifica se ja existe o rfid
	{	
		$sqlvv = "SELECT login_cons FROM consultor WHERE  login_cons='$login_cons'";//verificaçao
		foreach($pdo->query($sqlvv) as $row)
		{
			$totalrow3++;
		}
	}
$totalrow=1;
	if($rfid_atual!=$rfid_cons)//verifica se ja existe o rfid
	{	
		$sqlv = "SELECT rfid_colab FROM colaborador WHERE  rfid_colab='$rfid_cons'";//verificaçao
		foreach($pdo->query($sqlv) as $row)
		{
			$totalrow++;
		}
		$sqlv2 = "SELECT rfid_cons FROM consultor WHERE rfid_cons='$rfid_cons'";//verificaçao
		foreach($pdo->query($sqlv2) as $row)
		{
			$totalrow++;
		}
	}
$totalrow2=1;
	if($cpf_atual!=$cpf_cons)//verifica se ja existe o cpf
	{
		$sqlv = "SELECT cpf_colab FROM colaborador WHERE  cpf_colab='$cpf_cons'";//verificaçao
		foreach($pdo->query($sqlv) as $row)
		{
			$totalrow2++;
		}
		$sqlv2 = "SELECT cpf_cons FROM consultor WHERE cpf_cons='$cpf_cons'";//verificaçao
		foreach($pdo->query($sqlv2) as $row)
		{
			$totalrow2++;
		}
	}
	if($totalrow==1 && $totalrow2==1 && $totalrow3==1){	
		$sql="UPDATE consultor SET nome_cons=?,snome_cons=?,email_cons=?,tel_cons=?,end_cons=?,cep_cons=?,status_cons=?,cpf_cons=?,login_cons=?,senha_cons=?,rfid_cons=? WHERE id_cons=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome_cons,$snome_cons,$email_cons,$tel_cons,$end_cons,$cep_cons,$status_cons,$cpf_cons,$login_cons,$senha_cons,$rfid_cons,$id_cons));
		
		$sql3 = "DELETE FROM sala_has_consultor WHERE consultor_id_cons=?";
		$q = $pdo->prepare($sql3);
		$q->execute(array($id_cons));
		
		if($id_cons>0){
		$ListaSalas = $_POST['salas_cons'];
			foreach ($ListaSalas as $salas_colab) {
				$sql="INSERT INTO sala_has_consultor (consultor_id_cons,sala_id_sala) values(?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($id_cons,$salas_colab));		
			}
		}
		Database::disconnect();
		header("Location:../page/consulta_consultor.php?sucess=1");
		
	}else{
		header("Location:../page/consulta_consultor.php?falha=1");
	}
	}else{
	header("Location:../page/consulta_consultor.php?falha=2");
	}
?>