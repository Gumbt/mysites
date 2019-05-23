<?php
	require_once("../../banco/config.php");
	$nome=$_POST["nome"];
	$preco=$_POST["preco"];
	$marca=$_POST["marca"];
	$fornecedor=$_POST["fornecedor"];
	$descricao=$_POST["descricao"];
	$modelo=$_POST["modelo"];
	$idproduto=$_POST["idproduto"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM produto WHERE id_produto='$idproduto'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow>1){
		$sql = "UPDATE `produto` SET `nome`=?,`preco`=?,`marca`=?,`fornecedor`=?,`descricao`=?,`modelo`=? WHERE `id_produto`=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome,$preco,$marca,$fornecedor,$descricao,$modelo,$idproduto));
		
		$sql = "DELETE FROM `unidades` WHERE id_produto=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($idproduto));
		$contelements = $_POST['contelements'];
		if($contelements>0){
			$corarray = $_POST['cor'];
			$unidadesarray = $_POST['unidades'];
			$tamanhoarray = $_POST['tamanho'];
			for($i=0;$i<$contelements;$i++) {
				$sql="INSERT INTO unidades (tamanho,unidades,cor,id_produto) values(?,?,?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($tamanhoarray[$i],$unidadesarray[$i],$corarray[$i],$idproduto));		
			}
		}
		
		
		Database::disconnect();
		$success = "success";
		echo json_encode(array("success" => $success,"idproduto" => $idproduto));

		
	}else{
		$success = "erro";
		echo json_encode(array("success" => $success));
	}
	
?>