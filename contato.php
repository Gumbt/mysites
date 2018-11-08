<?php
$s = (isset($_GET['s']))? $_GET['s'] : "false";
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-96323024-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-96323024-3');
</script>
		<meta charset="UTF-8">
		<title>Psicowar | Contato</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Top BR clan do clash of clans" />
		<meta name="keywords" content="Psicowar, clash of clans" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<link href="/images/p.png" rel="icon" type="image/x-icon">
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css?version=7" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="/">Psicowar</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="/">Inicio</a></li>
						<li><a href="regras">Regras</a></li>
						<li><a href="historia">História</a></li>
						<li><a href="contato">Contato</a></li><li><a href="videos">Videos</a></li>
						<li><a href="clans" class="button special">Clans</a></li>
					</ul>
				</nav>
			</header>
<style>
body,html{
	height:100%;
}
#skel-layers-wrapper{
	height:100%!important;
}
</style>		
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
							<h3>Envie uma mensagem aos lideres do clan</h3>
							<?php if($s=="true"){echo "<span style='color:green'>Mensagem enviada com sucesso!!</span>";} ?>
							<form method="post" action="email">
								<div class="row uniform 50%">
									<div class="6u 12u$(4)">
										<input type="text" name="nome" id="name" value="" placeholder="Nome" required />
									</div>
									<div class="6u$ 12u$(4)">
										<input type="email" name="email" id="email" value="" placeholder="Email" required />
									</div>
									<!--<div class="12u$">
										<div class="select-wrapper">
											<select name="category" id="category">
												<option value="">- Category -</option>
												<option value="1">Manufacturing</option>
												<option value="1">Shipping</option>
												<option value="1">Administration</option>
												<option value="1">Human Resources</option>
											</select>
										</div>
									</div>
									<div class="4u 12u$(3)">
										<input type="radio" id="priority-low" name="priority" checked>
										<label for="priority-low">Low Priority</label>
									</div>
									<div class="4u 12u$(3)">
										<input type="radio" id="priority-normal" name="priority">
										<label for="priority-normal">Normal Priority</label>
									</div>
									<div class="4u$ 12u$(3)">
										<input type="radio" id="priority-high" name="priority">
										<label for="priority-high">High Priority</label>
									</div>
									<div class="6u 12u$(3)">
										<input type="checkbox" id="copy" name="copy">
										<label for="copy">Email me a copy of this message</label>
									</div>
									<div class="6u$ 12u$(3)">
										<input type="checkbox" id="human" name="human" checked>
										<label for="human">I am a human and not a robot</label>
									</div>-->
									<div class="12u$">
										<textarea name="msg" id="message" placeholder="Digite sua mensagem" rows="6" required></textarea>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Enviar mensagem" class="special" /></li>
											<li><input type="reset" value="Resetar" /></li>
										</ul>
									</div>
								</div>
							</form>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="12u$(medium)">
							<ul class="copyright">
								<li>&copy; Psicowar. All rights reserved.</li>
								<li>By: <a href="#">Gumb</a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>