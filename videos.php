<?php
require_once("adm/banco/config.php");
$p = (isset($_GET['p']))? $_GET['p'] : 1;
if(isset($_GET['v'])){
	$v = $_GET['v'];
}
?>

<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
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
		<title>Psicowar | Videos</title>
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
		<meta property="fb:app_id" content="1024175664413777">
		<meta property="fb:admins" content="100000632931162">
	</head>
	<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=1024175664413777&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Videos</h2>
						<p>Confira ataques e estratégias</p>
					</header>
<?php
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if(isset($_GET['v'])){
$sql = "SELECT * FROM videos WHERE idvideo=?";
$q = $pdo->prepare($sql);
$q->execute(array($v));
$data = $q->fetch(PDO::FETCH_ASSOC);
$url = $data["url"];
$titulo = $data["titulo"];
$criador = $data["criador"];
?>
<div id="our-work">
<div id="our-work2">
<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $url; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="video"></iframe></div><div class="overlay"><div class="titlevideo"><?php echo $titulo; ?></div><a href="#"><div class="autorvideo"><?php echo $criador; ?></div></a></div>
<div class="fb-comments" data-href="https://psicowar.com/videos?v=<?php echo $v; ?>" data-numposts="5" width="100%"></div>
</div>
<?php
}else{
?>
<div id="our-work">
<?php			

$registro = 4;
$inicio = ($registro*$p)-$registro;
$totalrow=0;
$sql = "SELECT * FROM videos";
foreach($pdo->query($sql) as $row)
{
	$totalrow++;
}
$numPaginas = ceil($totalrow/$registro); 
$sql = "SELECT * FROM videos ORDER by idvideo DESC LIMIT $inicio,$registro";
foreach($pdo->query($sql) as $row)
{
?>
<div class="galeryvideo">
	<div class="centralizarvideo">
	<div class="videosyt"><iframe src="https://www.youtube.com/embed/<?php echo $row["url"]; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div><div class="overlay"><a href="videos?v=<?php echo $row["idvideo"]; ?>"><div class="titlevideo"><?php echo $row["titulo"]; ?></div></a><a href="videos?v=<?php echo $row["idvideo"]; ?>"><div class="autorvideo"><?php echo $row["criador"]; ?></div><div class="comentariosvideo"><span class="fb-comments-count" data-href="https://psicowar.com/videos?v=<?php echo $row["idvideo"]; ?>"></span> comentario(s)</div></a></div>
	</div>
</div>

<?php } 
	echo '<ul class="pagination">';
			$previwep = $p-1;
			if($p>1){echo '<li><a href="?p='. $previwep .'"><i class="fa fa-caret-left"></i></a></li>';}		   
			for($i = $p - 3, $limiteDeLinks = $i + 6; $i <= $limiteDeLinks; $i++) { 

				if($i < 1){
					$i = 1;
					$limiteDeLinks = 7;
				}
				if($limiteDeLinks > $numPaginas){
					$limiteDeLinks = $numPaginas;
					$i = $limiteDeLinks - 6;
				}
				if($i < 1) {
					$i = 1;
					$limiteDeLinks = $numPaginas;
				}
				 
				if($i == $p)
				echo '<li><a class="active" href="?p='.$i.'">'.$i.'</a></li>';
				else
				echo '<li><a href="?p='.$i.'">'.$i.' </a></li>';
			} 
			$nextp = $p + 1;
			if(!empty($p)){echo '<li><a href="?p='.$nextp .'"><i class="fa fa-caret-right"></i></a>';}	
			 echo '</ul>';
	?>
	<div class="fb-comments" data-href="https://psicowar.com/videos" data-numposts="5" width="100%"></div>
</div>
<?php } 
Database::disconnect();	
?>
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