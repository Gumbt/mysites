<?php
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjgzY2ZkMzQ5LTM2MTgtNDA1Yi1iZmY0LTFhMjY5ZGE2ZWY0ZSIsImlhdCI6MTUyNDQ0MDUwMCwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTEiLCIzMS4xNzAuMTYxLjk0IiwiMzEuMTcwLjE2MS44OSIsIjMxLjE3MC4xNjEuOTIiLCIzMS4xNzAuMTYxLjk4Il0sInR5cGUiOiJjbGllbnQifV19.eDCsWdz8ZT_7hrZAbp5PJYQXC-d0SdLW4-R__5sxEBwMfR6jQDW8-dQZ93VnxkVdJGnwsME_zSAE2B6asvHABw';
$t = (isset($_GET['tag']))? $_GET['tag'] : "2LULCGP8"; 
$url = 'https://api.clashofclans.com/v1/clans/%23'.$t;
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
	if($message=="31.170.161.99" || $message=="31.170.161.97" || $message=="31.170.161.96" || $message=="31.170.161.95" || $message=="31.170.161.101"){//psicowar3 editado1
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjY5Nzk3YmNiLTNlNDgtNDdmNC1hZGY0LTA5ZjhiZTAyZDQ1OSIsImlhdCI6MTUyNDQ0MDU2NCwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTkiLCIzMS4xNzAuMTYxLjk3IiwiMzEuMTcwLjE2MS45NiIsIjMxLjE3MC4xNjEuOTUiLCIzMS4xNzAuMTYxLjEwMSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.k9kT07WLKvVnjr6DYuY15wO5OHaXqFX_i9qW-W9f7znKHd7jGflNsKhgRTTWiw2Di5E4WTTJByopRiBm83pDfw';
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
if($response && !isset($response['reason'])){
	$tag = $response['tag'];
	$name = $response['name'];
	$type = $response['type'];
	$descri = $response['description'];
	$local = $response['location']['name'];
	$icone = $response['badgeUrls']['medium'];
	$clanlvl = $response['clanLevel'];
	$clantroph = $response['clanPoints'];
	$members = $response['members'];
	$warwins = $response['warWins'];
	$warfrequency = $response['warFrequency'];
	$requiredtrophies = $response['requiredTrophies'];
}else{
	$tag = "#2LULCGP8";
	$name = "Psicowar";
	$type = "inviteOnly";
	$descri = "Melhor clan do clash of clans";
	$local = "Brazil";
	$icone = "https://api-assets.clashofclans.com/badges/200/zDcHeObDHUnr7BYhpPuZpPwatxfenu_wO5tJZ8MTYBk.png";
	$clanlvl = 15;
	$clantroph = 0;
	$members = 0;
	$warwins = 0;
	$warfrequency = "always";
	$requiredtrophies = 4200;
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
		<title>Psicowar | Clans</title>
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
		<link rel="stylesheet" href="css/listmembers.css" />
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css?version=4" />
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
						<a href="?tag=2LULCGP8"><div class="nossosclans2 button <?php if($t!="2LULCGP8"){echo "alt";} ?>">Psicowar</div></a>
						<a href="?tag=C08PQC9G"><div class="nossosclans2 button <?php if($t!="C08PQC9G"){echo "alt";} ?>">PSICO REBORN</div></a>
						<a href="?tag=8UVPYCGL"><div class="nossosclans2 button <?php if($t!="8UVPYCGL"){echo "alt";} ?>">LIGA DE METAL</div></a>
						<a href="?tag=2YGL80CY"><div class="nossosclans2 button <?php if($t!="2YGL80CY"){echo "alt";} ?>">Dinastia Clã</div></a>
						<a href="?tag=9LP8YJLY"><div class="nossosclans2 button <?php if($t!="9LP8YJLY"){echo "alt";} ?>">Caçadores</div></a>
						<a href="?tag=YPVJOGGY"><div class="nossosclans2 button <?php if($t!="YPVJOGGY"){echo "alt";} ?>">Gato Preto</div></a>
						<a href="?tag=POPVOV28"><div class="nossosclans2 button <?php if($t!="POPVOV28"){echo "alt";} ?>">SKILLBRUTA</div></a>
						<a href="?tag=PLLQYRJJ"><div class="nossosclans2 button <?php if($t!="PLLQYRJJ"){echo "alt";} ?>">Os Indomáveis</div></a>
					</div>
					<div style="width:100%">
						<img src='<?php echo $icone; ?>' style='height:100px;z-index: 100;position: relative;'/>
						<h5><?php echo $tag; ?></h5>					
							<h2><?php echo $name; ?></h2>						
							<p><?php echo $descri; ?></p>
							<div class="detalhes" style="min-height: 280px!important;">
								<div class="itensdett">
								   <div class="itensdet" >
									  <div class="ClanDetails-Hero-CountryFlag" ><img src="/images/Brazil.png" ></div>

									  <span >Brazil</span>
								   </div>
								</div>
								<div class="itensdett">
								   <div class="itensdet" >
									  <div class="">
										 <img src="/images/trophy.png" alt="Points" style="    width: 50px;">
										 <div class="ClanDetails-Hero-Box-Text" >
											<span ><?php echo $clantroph; ?></span><br ><span class="" >Total de troféus</span>
										 </div>
									  </div>
								   </div>
								</div>
								<div class="itensdett">
								   <div class="itensdet" >
									  <div class="">
										 <img src="/images/wars.png" alt="Wars" style="    width: 50px;">
										 <div class="" ><span ><?php echo $warwins;?></span><br ><span class="" >Guerras vencidas</span></div>
									  </div>
								   </div>
								</div>
							   <div class="itensdet2">					   
									<span class="" >Membros: </span><span ><?php echo $members;?>/50</span>
								  <div class="" ><span class="" >Tipo: </span><span><?php if($type=="inviteOnly"){echo "Somente Convidados";}
								  if($type=="closed"){echo "Fechado";}if($type=="open"){echo "Aberto";} ?></span></div>
								  <div class="" ><span class="" >Frequência de guerra: </span><span ><?php if($warfrequency=="always"){echo "Sempre";}
								  if($warfrequency=="moreThanOncePerWeek"){echo "Mais de uma por semana";}
								  if($warfrequency=="oncePerWeek"){echo "Uma vez por semana";}
								  if($warfrequency=="lessThanOncePerWeek"){echo "Raramente";}
								  if($warfrequency=="never"){echo "Nunca";}
								  if($warfrequency=="unknown"){echo "Indiferente";}
									?></span></div>
								  <div class="" ><span class="" >Troféus necessários: </span><span ><?php echo $requiredtrophies; ?></span></div>
							   </div>					   
							</div>
					</div>
					</header>
					<section class="profiles">
					<br>
						<h4>Membros (clique para ver o perfil)</h4>				
						<?php
						$cont=0;
						if($response && !isset($response['reason'])){
						while ($cont<$response['members'])
						{								
							$cont2=$cont+1;
						?>
							<div id="<?php echo str_replace('#','',$response['memberList'][$cont]['tag']); ?>">	
								<div class='PlayerListItem ClanDetailsMember userprofile' style="cursor:pointer;" name="<?php echo str_replace('#','',$response['memberList'][$cont]['tag']); ?>">				
									<div class='PlayerListItem-left'>
										<div class="PlayerListItem-inner-left">
											<div class="PlayerListItem-position-container">
												<div class="PlayerListItem-position">
													<?php echo $cont2; ?>
												</div>
												<?php if($response['memberList'][$cont]['previousClanRank']!=0){$dif=$response['memberList'][$cont]['previousClanRank']-$response['memberList'][$cont]['clanRank'];}else{$dif=0;} ?>
												<div class="rankChange <?php if($dif==0){echo "ranking-same";}if($dif>0){echo "ranking-up";}if($dif<0){echo "ranking-down";} ?>"><?php if($dif!=0){$dif = preg_replace('/[-]/','',$dif); echo $dif;} ?></div>
											</div>
											<div class="PlayerListItem-league-icon">
												<img class=" lazyloaded" src='<?php echo $response['memberList'][$cont]['league']['iconUrls']['small']; ?>'/>
											</div>
											<div class="PlayerListItem-experience">
												<div class="svg-container PlayerListItem-svg-container" >
													<img src="/images/player/XP.png">
												</div>
												<div class="PlayerListItem-expLevel">
													<?php echo $response['memberList'][$cont]['expLevel']; ?>
												</div>
											</div>
										</div>
										<div class="PlayerListItem-info-container">
											<div class="PlayerListItem-name" ><span><?php echo $response['memberList'][$cont]['name']; ?></span></div>
											<div class="PlayerListItem-role" ><?php if($response['memberList'][$cont]['role']=="leader"){echo "Líder";}if($response['memberList'][$cont]['role']=="coLeader"){echo "Colider";}if($response['memberList'][$cont]['role']=="admin"){echo "Ancião";} ?></div>
										</div>
									</div>
									<div class="PlayerListItem-right">
										<div class="PlayerListItem-inner-right" >
											<div class="PlayerListItem-wins-container" >
											<div class="PlayerListItem-wins-headline" >Tropas Doadas:</div>
											<div class="PlayerListItem-wins-count" ><?php echo $response['memberList'][$cont]['donations']; ?></div></div>
											<div class="PlayerListItem-wins-container" >
											<div class="PlayerListItem-wins-headline" >Tropas Recebidas:</div>
											<div class="PlayerListItem-wins-count" ><?php echo $response['memberList'][$cont]['donationsReceived']; ?></div></div>
										</div>
										<div class="PlayerListItem-points-container" >
											<div class="PlayerListItem-points" >
												<span><?php echo $response['memberList'][$cont]['trophies']; ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="precarrega hidden">
									<img class="carrega" src="images/carregando.gif" >
								</div>
							</div>
							<div class="<?php echo str_replace('#','',$response['memberList'][$cont]['tag']); ?> hidden" value="0">
								<div class="town-hall-info">
									<div class="preinfoth">
										<div class="league-stats">
											<div class="all-time-best small-shadow">
											  <div class="league-stats-title">All time best:</div>
											  <div class="league-bg"><span class="league-stat-icon"><img class="imgalltimebest" src="images/carregando.gif"></span><span class="league-stat ng-binding"><img src="images/player/Trophy.png" class="trofeu" ><span class="besttroph">0</span></span></div>
											</div>
											<div class="war-stars-won small-shadow">
											  <div class="league-stats-title">War Stars Won:</div>
											  <div class="league-bg"><span class="league-stat-icon" ><img src="images/player/WarStars.png"></span><span class="league-stat ng-binding infowarstars" style="float: left;margin-top: 5px;">0</span></div>
											</div>
										
										  </div>
											<div class="stats-info center">
											  <div class="statsatks"><span class="stats-title tiny-shadow">Troops donated:</span>
											  <span class="stats-total ng-binding infodoadas">0</span></div>
											  <div class="statsatks"><span class="stats-title tiny-shadow">Troops received:</span>
											  <span class="stats-total ng-binding inforecebidas">0</span></div>
											  <div class="statsatks"><span class="stats-title tiny-shadow">Attacks Won:</span>
											  <span class="stats-total ng-binding infoataks">0</span></div>
											  <div class="statsatks"><span class="stats-title tiny-shadow">Defenses Won:</span>
											  <span class="stats-total ng-binding infodefesas">0</span></div>
											</div>
									</div>
									<div class="posinfoth">
										<div class="town-hall left"><img class="thlevel" src="images/carregando.gif"></div>
										<div class="avatars left troops small-shadow">
										  <span>Troops</span><br>
										  <!-- ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Barbarian.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding barbaro">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Archer.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding arqueira">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Giant.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding gigante">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Goblin.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding goblin">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Wall Breaker.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span class="level-shadow center ng-binding quebramuro">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Balloon.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding balao">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Wizard.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding mago">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Healer.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding curadora">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Dragon.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding dragao">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_P.E.K.K.A.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding pekka">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Baby Dragon.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding bbdragao">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Miner.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding mineiro">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Minion.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding minion">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Hog Rider.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding corredor">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Valkyrie.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding valk">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Golem.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding golem">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Witch.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding bruxa">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Lava Hound.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding lava">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="troop in fullTroops | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_Bowler.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding lanca">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: troop in fullTroops | filter: { village: 'home' } | orderBy: 'order' -->
										</div>
										<div class="avatars left spells small-shadow">
										  <span>Spells</span><br>
										  <!-- ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Lightning Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding raio">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Healing Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding cura">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Rage Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding furia">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Jump Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding salto">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Freeze Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding gelo">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Clone Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding clone">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Poison Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding veneno">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Earthquake Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding terremoto">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Haste Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding haste">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="spell in fullSpells | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/spells/Skeleton Spell.png'); background-size: cover; width: 42px; height: 42px;">
												<span  class="level-shadow center ng-binding skeleto">1</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: spell in fullSpells | orderBy: 'order' -->
										</div>
										<div class="avatars left heroes small-shadow">
										  <span>Heroes</span><br>
										  <!-- ngRepeat: hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/townhall/heroes/Barbarian King.png'); background-size: cover; width: 42px; height: 42px;">
												<span ng-class="{'': hero.level === hero.endLevel}" ng-show="hero.level !== 0" class="level-shadow center ng-binding king">10</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/townhall/heroes/Archer Queen.png'); background-size: cover; width: 42px; height: 42px;">
												<span ng-class="{'': hero.level === hero.endLevel}" ng-show="hero.level !== 0" class="level-shadow center ng-binding queen">10</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order' --><div class="avatar-list ng-scope" ng-repeat="hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order'">
											<div class="avatar">
											  <div class="tropsandall" style="background: url('images/townhall/heroes/Grand Warden.png'); background-size: cover; width: 42px; height: 42px;">
												<span ng-class="{'': hero.level === hero.endLevel}" ng-show="hero.level !== 0" class="level-shadow center ng-binding guardian">10</span>
											  </div>
											</div>
										  </div><!-- end ngRepeat: hero in fullHeroes | filter: { village: 'home' } | orderBy: 'order' -->
										</div>
									</div>
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