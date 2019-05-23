<?php
session_start();
session_destroy();
ob_start();
$clear=null;
setcookie("usuario", $clear, time()-3600,"/");
setcookie("senha", $clear, time()-3600,"/");
header("Location:../login");

	
?>