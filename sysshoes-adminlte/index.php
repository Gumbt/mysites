<?php
session_start();
require_once("banco/config.php");
if(isset($_COOKIE['usuario'])&& isset($_COOKIE['senha'])){
	$usuario=base64_decode($_COOKIE['usuario']);
	$senha=base64_decode($_COOKIE['senha']);
}else{
	if(isset($_SESSION["usuario"])&&isset($_SESSION["senha"])){
		setcookie("usuario", $_SESSION["usuario"],time() + (86400 * 2),'/');
		setcookie("senha", $_SESSION["senha"],time() + (86400 * 2),'/');
		$usuario=base64_decode($_SESSION["usuario"]);
		$senha=base64_decode($_SESSION["senha"]);
	}
}
if(!isset($usuario) && !isset($senha)){
	header("Location:login");
}else{
	header("Location:venda/vendas");

}
?>