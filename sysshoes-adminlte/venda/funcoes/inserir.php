<?php
	require_once("../../banco/config.php");
	$idproduto=$_POST["idproduto"];
	$idcliente=$_POST["idcliente"];
	$iduser=$_POST["iduser"];
	$desconto=$_POST["desconto"];
	$pagamento=$_POST["pagamento"];
	date_default_timezone_set('America/Sao_Paulo');
	$data = date('Y-m-d');
	$hora = date('H:i:s');

	session_start();
	$erro = "clear";
	$contelements = $_POST['contelements'];
	if($idcliente!=0){
		if($contelements>0){
			$pdo=Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$corarray = $_POST['cor'];
			$unidadesarray = $_POST['unidades'];
			$tamanhoarray = $_POST['tamanho'];
		
				$sql = "INSERT INTO `venda`(`id_produto`, `desconto`, `pagamento`,`data_venda`,`hora_venda`,`id_user`,`id_cliente`) VALUES (?,?,?,?,?,?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($idproduto,$desconto,$pagamento,$data,$hora,$iduser,$idcliente));
				$sql = "SELECT * FROM venda WHERE id_produto=? AND id_cliente=? AND data_venda=? AND hora_venda=?";
				$q = $pdo->prepare($sql);
				$q->execute(array($idproduto,$idcliente,$data,$hora));
				$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
				$id_venda = $data["id_venda"];
				
				for($i=0;$i<$contelements;$i++) {
					if($unidadesarray[$i]>0){
						$sql = "SELECT * FROM unidades WHERE id_produto=? AND tamanho=? AND cor=?";
						$q = $pdo->prepare($sql);
						$q->execute(array($idproduto,$tamanhoarray[$i],$corarray[$i]));
						$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
						$unidades = intval($data["unidades"]);
						$unidadesarrayint = intval($unidadesarray[$i]);
						if($unidades>=$unidadesarrayint){
							$sql="INSERT INTO venda_unidades (tamanho,unidades,cor,id_venda) values(?,?,?,?)";
							$q=$pdo->prepare($sql);
							$q->execute(array($tamanhoarray[$i],$unidadesarray[$i],$corarray[$i],$id_venda));
							$unidtotal = $unidades - $unidadesarray[$i];
							$sql = "UPDATE `unidades` SET `unidades`=? WHERE `id_produto`=? AND tamanho=? AND cor=?";
							$q=$pdo->prepare($sql);
							$q->execute(array($unidtotal,$idproduto,$tamanhoarray[$i],$corarray[$i]));
						}else{
							$erro = "Estoque insuficiente";
						}
					}
				}
				Database::disconnect();
			if($erro == "clear"){
				$success = "success";
				echo json_encode(array("success" => $success,"idvenda" => $id_venda));
			}else{
				$success = "erro";
				echo json_encode(array("success" => $success,"erro" => $erro));
			}
		}else{
			$erro = "Sem unidades do produto disponivel";
			$success = "erro";
			echo json_encode(array("success" => $success,"erro" => $erro));
		}
	}else{
		$erro = "Cliente não encontrado";
		$success = "erro";
		echo json_encode(array("success" => $success,"erro" => $erro));
	}
?>