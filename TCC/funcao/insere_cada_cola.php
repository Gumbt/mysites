
<?php
	require_once("../config/config.php");

	if(!empty($_POST)){		
		
		
		$nome_colab=$_POST["nome_colab"];
		$snome_colab=$_POST["snome_colab"];
		$email_colab=$_POST["email_colab"];
		$tel_colab=$_POST["tel_colab"];
		$end_colab=$_POST["end_colab"];
		$cep_colab=$_POST["cep_colab"];
		$status_colab=$_POST["status_colab"];
		$cpf_colab=$_POST["cpf_colab"];
		
		$rfid_colab=$_POST["rfid_colab"];
		$id_cons=$_POST["id_cons"];
		
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$totalrow=1;	
	$sqlv = "SELECT rfid_colab,cpf_colab FROM colaborador WHERE cpf_colab='$cpf_colab' OR rfid_colab='$rfid_colab'";//verificaçao
	foreach($pdo->query($sqlv) as $row)
	{
		$totalrow++;
	}
	$sqlv2 = "SELECT rfid_cons,cpf_cons FROM consultor WHERE cpf_cons='$cpf_colab' OR rfid_cons='$rfid_colab'";//verificaçao
	foreach($pdo->query($sqlv2) as $row)
	{
		$totalrow++;
	}
	if($totalrow==1){	
		
		$sql="INSERT INTO colaborador (nome_colab,snome_colab,email_colab,tel_colab,end_colab,cep_colab,status_colab,cpf_colab,rfid_colab) values(?,?,?,?,?,?,?,?,?)";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome_colab,$snome_colab,$email_colab,$tel_colab,$end_colab,$cep_colab,$status_colab,$cpf_colab,$rfid_colab));
		Database::disconnect();
		
		
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql1 = "SELECT id_colab FROM colaborador WHERE cpf_colab=?";
		$q = $pdo->prepare($sql1);
		$q->execute(array($cpf_colab));
		
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		
		$id_colab = $data["id_colab"];
	
		if($id_cons!=0){
			date_default_timezone_set('America/Sao_Paulo');
			$dt_relcolab = date("Y/m/d");
			$hr_relcolab = date("H:i:s");
			$sql="INSERT INTO consultor_cad_colab SET colaborador_id_colab=?,consultor_id_cons=?,dt_relcolab=?,hr_relcolab=?,tipo_relcolab=1";
			$q=$pdo->prepare($sql);
			$q->execute(array($id_colab,$id_cons,$dt_relcolab,$hr_relcolab));
		}
		
		if($id_colab>0){
		$ListaSalas = $_POST['salas_colab'];
			foreach ($ListaSalas as $salas_colab) {
				$sql="INSERT INTO colaborador_has_sala (colaborador_id_colab,sala_id_sala) values(?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($id_colab,$salas_colab));		
			}
		}


		Database::disconnect();
		header("Location:../index.php?sucesso=1");
	}else{
		header("Location:../index.php?falha=1");
	}
	
	}

	

 
?>