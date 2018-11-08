<?php
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjQxNDdlYzNkLTVlNTQtNGE0MS1iMDAwLTE3NGEyMWVkZWU2OSIsImlhdCI6MTUyMzY1NzAxNSwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTIiLCIzMS4xNzAuMTYxLjEwMSIsIjMxLjE3MC4xNjEuOTQiLCIzMS4xNzAuMTYxLjkxIiwiMzEuMTcwLjE2MS44OSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.8mNIu67a9riqPIxJI1WuzZbjBP3uS-jqnFJ9fsCbFD3svygBlesKpIT7OsvvCZUJmkEIAfYQ8ETksFoJF6ujUg';
$url = 'https://api.clashofclans.com/v1/locations/32000038/rankings/clans';
//$urllocal = 'https://api.clashofclans.com/v1/locations/32000038/rankings/clans';
//$urlclan = 'https://api.clashofclans.com/v1/clans/%23CPGLG802';
$headers = array(
"Accept: application/json",
"Authorization: Bearer " . $api_key
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL,$url);
$result = curl_exec($ch);
$response = json_decode($result,true);
if(isset($response['message'])){
	$message = $response['message'];
	$message = substr($message, -14);
	$message = ltrim($message);
	if($message=="31.170.161.86" || $message=="31.170.161.87" || $message=="31.170.161.88" || $message=="31.170.161.90" || $message=="31.170.161.93"){//psicowar2
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjJjNjhlN2YwLWExNTItNDUwMS1iNGQ1LTIyMDVkMzNkMmFiMSIsImlhdCI6MTUyMzcyODU0NSwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuODYiLCIzMS4xNzAuMTYxLjg3IiwiMzEuMTcwLjE2MS44OCIsIjMxLjE3MC4xNjEuOTAiLCIzMS4xNzAuMTYxLjkzIl0sInR5cGUiOiJjbGllbnQifV19.s0cxZo4qZlnmt5AO1fDd1H8tNpoFLLWAZtTAn7sefFo49rG4-faWYXAxl6xnSLdAQIomFG9N0fqlxgRcJeV21w';
	}
	if($message=="31.170.161.95" || $message=="31.170.161.96" || $message=="31.170.161.97" || $message=="31.170.161.98" || $message=="31.170.161.99"){//psicowar3
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjYzNDcwZDAxLTFkOWItNGUzNS1iNDJiLTQzNTNhNzg4YWE0OSIsImlhdCI6MTUyMzcyODY5Niwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTUiLCIzMS4xNzAuMTYxLjk2IiwiMzEuMTcwLjE2MS45NyIsIjMxLjE3MC4xNjEuOTgiLCIzMS4xNzAuMTYxLjk5Il0sInR5cGUiOiJjbGllbnQifV19.g5_0AcrbDijEFpYmv-b4jEeEs-XlhQzfqfp04s7kxDOwjVmelhARczo1S7etO8tRRO1IsNF1vZm9evivaHpO0g';
	}
	if($message=="31.170.161.100" || $message=="31.170.161.102" || $message=="31.170.161.103" || $message=="31.170.161.104" || $message=="31.170.161.105"){//psicowar4
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjViMDI5ZjZjLTNmMTItNDU1Zi1hNGYwLTZlOWUxMTBkNGRiMCIsImlhdCI6MTUyMzcyODc0Miwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuMTAwIiwiMzEuMTcwLjE2MS4xMDIiLCIzMS4xNzAuMTYxLjEwMyIsIjMxLjE3MC4xNjEuMTA0IiwiMzEuMTcwLjE2MS4xMDUiXSwidHlwZSI6ImNsaWVudCJ9XX0.MrvtBRlVH9tesfkXiZMxzyzFB7pMGzuEusK0gFkDSZ58v0vbf_kCEQjpYwWDi2r2jFaiiHCbu3QhizpVZZU_Pw';
	}
	$headers = array(
	"Accept: application/json",
	"Authorization: Bearer " . $api_key
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result = curl_exec($ch);
	$response = json_decode($result,true);
	
}
curl_close($ch);
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
		<title>Psicowar | Ranking</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
		<meta name="description" content="Top BR clan do clash of clans" />
		<meta name="keywords" content="Psicowar, clash of clans" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/my.js"></script>
		<link href="/images/p.png" rel="icon" type="image/x-icon">
		<link rel="stylesheet" href="css/clanlist.css" />
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css?version=2" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="/">Psicowar</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="/">Inicio</a></li>
						<li><a href="regras">Regras</a></li>
						<li><a href="historia">História</a></li>
						<li><a href="contato">Contato</a></li>
						<li><a href="clans" class="button special">Clans</a></li>
					</ul>
				</nav>
			</header>

		<div class="testback">
		
		</div>
		<!-- Two -->
			<section id="main" class="wrapper" style="padding:8em 0em 1em">
				<div class="container">
					<header class="major">	
					<div class="nossosclans">
					<h4>Clans da família Psicowar:</h4>
						<a href="?tag=2LULCGP8"><div class="nossosclans2 button alt">TOP BR</div></a>
						<a href="?tag=C08PQC9G"><div class="nossosclans2 button">CLANS DA FAMÍLIA PSICOWAR</div></a>

					</div>
					</header>
					<section class="profiles">
					<br>
						<h4>Membros (clique para ver o perfil)</h4>				
						<?php
						$cont=0;
						if(isset($response) && !isset($response['reason'])){
						while ($cont<200)
						{								
						?>
							<div id="<?php echo str_replace('#','',$response['items'][$cont]['tag']); ?>">	
								<div class='PlayerListItem ClanDetailsMember userprofile' name="<?php echo str_replace('#','',$response['items'][$cont]['tag']); ?>">				
									<div class='PlayerListItem-left'>
										<div class="PlayerListItem-inner-left">
											<div class="PlayerListItem-position-container">
												<div class="PlayerListItem-position">
													<?php echo $response['items'][$cont]['rank']; ?>
												</div>
												<?php if($response['items'][$cont]['previousRank']!=0){$dif=$response['items'][$cont]['previousRank']-$response['items'][$cont]['rank'];}else{$dif=0;} ?>
												<div class="rankChange <?php if($dif==0){echo "ranking-same";}if($dif>0){echo "ranking-up";}if($dif<0){echo "ranking-down";} ?>"><?php if($dif!=0){$dif = preg_replace('/[-]/','',$dif); echo $dif;} ?></div>
											</div>
											<div class="PlayerListItem-league-icon" style="border-right: none!important;">
												<img class=" lazyloaded" src='<?php echo $response['items'][$cont]['badgeUrls']['small']; ?>'/>
											</div>
										</div>
										<div class="PlayerListItem-info-container">
											<div class="PlayerListItem-name" ><span><?php echo $response['items'][$cont]['name']; ?></span></div>
										</div>
									</div>
									<div class="PlayerListItem-right">									
										<div class="PlayerListItem-points-container" >
											<div class="PlayerListItem-points" >
												<span><?php echo $response['items'][$cont]['clanPoints']; ?></span>
											</div>
										</div>
										<div class="PlayerListItem-inner-right" >
											<div class="PlayerListItem-wins-container" >
											<div class="PlayerListItem-wins-headline" >Membros:</div>
											<div class="PlayerListItem-wins-count" ><?php echo $response['items'][$cont]['members']; ?>/50</div></div>
										</div>
									</div>
								</div>
								<div class="precarrega hidden">
									<img class="carrega" src="images/carregando.gif" >
								</div>
							</div>
						<?php
							$cont++;
						}
						}else{echo "Servidor indisponivel";}						
						?>

					</section>
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