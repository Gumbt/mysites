<?php
	require_once("../config/config.php");
	if(!empty($_POST)){	
	$login=$_POST["login"];
	$senha=$_POST["senha"];
	
	
	if($login=="admin" && $senha=="123")
	{
		session_start();
		$_SESSION["login"]="admin";
		header("Location:../index.php");
	}else{
	
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$totalrow = 1;
		$sql="SELECT login_cons,senha_cons,status_cons FROM consultor WHERE login_cons='$login' AND senha_cons='$senha'";
		foreach($pdo->query($sql) as $row)
		{
			$totalrow++;
		}
		if($totalrow>1){
			foreach($pdo->query($sql) as $row)
			{
				if($row['status_cons']=="ativo"){
					if($row['login_cons']==$login && $row['senha_cons']==$senha)
					{
					session_start();
					$_SESSION["login"]=$row['login_cons'];
					header("Location:../index.php");
					}else{
					header("Location:../login.php?falha=1");
					}
				}else{
					header("Location:../login.php?inativo=1");
				}
			}
		}
		else{
			header("Location:../login.php?falha=1");
		}
	}
	}
?>