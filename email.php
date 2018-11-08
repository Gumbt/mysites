<?php
require_once("adm/banco/config.php");
date_default_timezone_set('America/Sao_Paulo');
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['msg'];
$data_envio = date('d/m/Y');
$data_enviobd = date('Y/m/d');
$hora_envio = date('H:i:s');
$pdo=Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO `email`(`nome`, `email`, `mensagem`,`data`,`hora`,`lida`,`respondida`,`id_resposta`) VALUES (?,?,?,?,?,?,?,?)";
$q=$pdo->prepare($sql);
$q->execute(array($nome,$email,$mensagem,$data_enviobd,$hora_envio,0,0,0));
$arquivo = $mensagem."<br>
			Nome: ".$nome."<br>
			E-mail:<b> ".$email."</b><br>
			Este e-mail foi enviado em <b>".$data_envio."</b> as <b>".$hora_envio."</b><br>
			Email automatico do clan Psicowar";
$emailenviar = "diogobrock@gmail.com, gustavo.bonassa1@gmail.com, gumb@psicowar.ga";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site Psicowar";

  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
      $headers .= "From: ". $email. "\n";
	  $headers .= "Return-Path: ".$email. "\n";
  //$headers .= "Bcc: $EmailPadrao\r\n";
  
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo $mgm;
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
header("Location:contato?s=true");

?>