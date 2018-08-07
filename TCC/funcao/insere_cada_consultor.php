
<?php
	require_once("../config/config.php");

	if(!empty($_POST)){		
		
		
		$nome_cons=$_POST["nome_cons"];
		$snome_cons=$_POST["snome_cons"];
		$email_cons=$_POST["email_cons"];
		$tel_cons=$_POST["tel_cons"];
		$end_cons=$_POST["end_cons"];
		$cep_cons=$_POST["cep_cons"];
		$status_cons=$_POST["status_cons"];
		$cpf_cons=$_POST["cpf_cons"];
		
		$login_cons=$_POST["login_cons"];
		$senha_cons=$_POST["senha_cons"];
		
		$rfid_cons=$_POST["rfid_cons"];
		if($login_cons!="admin"){
			$pdo=Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$totalrow=1;	
			$sqlv = "SELECT rfid_colab,cpf_colab FROM colaborador WHERE cpf_colab='$cpf_cons' OR rfid_colab='$rfid_cons'";//verificaçao
			foreach($pdo->query($sqlv) as $row)
			{
				$totalrow++;
			}
			$sqlv2 = "SELECT rfid_cons,cpf_cons FROM consultor WHERE cpf_cons='$cpf_cons' OR rfid_cons='$rfid_cons'";//verificaçao
			foreach($pdo->query($sqlv2) as $row)
			{
				$totalrow++;
			}
			$sqlv3 = "SELECT login_cons FROM consultor WHERE login_cons='$login_cons'";//verificaçao
			foreach($pdo->query($sqlv3) as $row)
			{
				$totalrow++;
			}
			if($totalrow==1){	
				$sql="INSERT INTO consultor (nome_cons,snome_cons,email_cons,tel_cons,end_cons,cep_cons,status_cons,cpf_cons,login_cons,senha_cons,rfid_cons) values(?,?,?,?,?,?,?,?,?,?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($nome_cons,$snome_cons,$email_cons,$tel_cons,$end_cons,$cep_cons,$status_cons,$cpf_cons,$login_cons,$senha_cons,$rfid_cons));
				Database::disconnect();
				
				
				
				$pdo=Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql1 = "SELECT id_cons FROM consultor WHERE cpf_cons=?";
				$q = $pdo->prepare($sql1);
				$q->execute(array($cpf_cons));
				
				$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
				
				$id_cons = $data["id_cons"];
			
				
				if($id_cons>0){
				$ListaSalas = $_POST['salas_cons'];
					foreach ($ListaSalas as $salas_cons) {
						$sql="INSERT INTO sala_has_consultor (consultor_id_cons,sala_id_sala) values(?,?)";
						$q=$pdo->prepare($sql);
						$q->execute(array($id_cons,$salas_cons));		
					}
				}


				Database::disconnect();
				header("Location:../index.php?sucesso=2");
			}else{
				header("Location:../index.php?falha=4");
			}
		}else{
			header("Location:../index.php?falha=3");
		}
	}
	

 
?>