<?php
session_start();
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
if(isset($usuario) && isset($senha)){
	header("Location:/");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | SysShoes</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Sys<b>Shoes</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="banco/login">
                    <div class="msg">Entre para iniciar sua sessão</div>					
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                        </div>
                    </div>
					<?php if(isset($_GET['erro'])&&$_GET['erro']=="true"){echo '<div style="color:red;text-align: center;">Usuario e senha não conferem</div>';} ?>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Lembrar-me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-red waves-effect" type="submit">ENTRAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Esqueceu sua senha?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>