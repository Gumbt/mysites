<?php
$t = '2LULCGP8';
include_once("controle.php");

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
		<title>Psicowar | Clash of clans</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
		<meta name="description" content="Top clan BR Clash of Clans" />
		<meta name="keywords" content="Psicowar, clash of clans" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/my.js?version=2"></script>
		<link href="/images/p.png" rel="icon" type="image/x-icon">
		<link rel="stylesheet" href="css/listmembers.css?version=1" />
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css?version=7" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <meta property="og:image" content="psicowar.ga/images/p.png"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="https://psicowar.ga/"/>
  <meta property="og:title" content="Psicowar"/>
  <meta property="og:description" content="Top clan BR Clash of Clans"/>
  <meta property="fb:app_id" content="1024175664413777">
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
						<li><a href="videos">Videos</a></li>
						<li><a href="clans" class="button special">Clans</a></li>
					</ul>
				</nav>
			</header>
		<!-- Two -->
			<section id="two" class="wrapper2 style2">
				<div class="container">
					<header class="major">
					<img src='<?php echo $icone; ?>' style='height:100px;z-index: 100;position: relative;'/>
					<h5><?php echo $tag; ?></h5>
						<h2><?php echo $name; ?></h2>						
						<p><?php echo $descri; ?></p>
						<div class="detalhes" >
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
							<div class="row">
										<div class="col s6 m3">
											<div class="info-badge badge-members">
												<div class="title">
													<span>Membros</span>
												</div>
												<div class="info">
													<div class="picto sprites sprites-trophy"></div>
													<div class="value"><?php echo $members;?>/50</div>
												</div>
											</div>
										</div>
										<div class="col s6 m3">
											<div class="info-badge badge-trophy-color">
												<div class="title">
													<span>Troféus Necessários</span>
												</div>
												<div class="info">
													<div class="value"><?php echo $requiredtrophies; ?></div>
												</div>
											</div>
										</div>
										<div class="col s6 m3">
											<div class="info-badge badge-versus-color">
												<div class="title">
													<span>Troféus Construtor</span>
												</div>
												<div class="info">
													<div class="value"><?php echo $clanVersusPoints; ?></div>
												</div>
											</div>
										</div>
										<div class="col s6 m3">
											<div class="info-badge small-text">
												<div class="title">
													<span>Tipo</span>
												</div>
												<div class="info">
													<div class="value"><?php if($type=="inviteOnly"){echo "Somente Convidados";}
													  if($type=="closed"){echo "Fechado";}if($type=="open"){echo "Aberto";} ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col s6 m3">
											<div class="info-badge small-text">
												<div class="title">
													<span>Frequência de guerra</span>
												</div>
												<div class="info">
													  <div class="value"><?php if($warfrequency=="always"){echo "Sempre";}
											  if($warfrequency=="moreThanOncePerWeek"){echo "Mais de uma por semana";}
											  if($warfrequency=="oncePerWeek"){echo "Uma vez por semana";}
											  if($warfrequency=="lessThanOncePerWeek"){echo "Raramente";}
											  if($warfrequency=="never"){echo "Nunca";}
											  if($warfrequency=="unknown"){echo "Indiferente";}
												?></div>
												</div>
											</div>
										</div>
										<div class="col s6 m3">
										<a href="regras" style="text-decoration: none;">
											<div class="info-badge badge-rules">
												<div class="info">
													<div class="value">Regras</div>
												</div>
											</div>
										</a>
										</div>
								  </div>
						   </div>												   
						</div>
					</header>
					<section class="profiles">
					<br>
						<h4>Membros (clique para ver o perfil)</h4>				
						<?php
						$cont=0;
						if(isset($response) && !isset($response['reason'])){
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
											  <div class="league-stats-title">Melhores troféus:</div>
											  <div class="league-bg"><span class="league-stat-icon"><img class="imgalltimebest" src="images/carregando.gif"></span><span class="league-stat ng-binding"><img src="images/player/Trophy.png" class="trofeu" ><span class="besttroph">0</span></span></div>
											</div>
											<div class="war-stars-won small-shadow">
											  <div class="league-stats-title">Estrelas de guerra:</div>
											  <div class="league-bg"><span class="league-stat-icon" ><img src="images/player/WarStars.png"></span><span class="league-stat ng-binding infowarstars" style="float: left;margin-top: 5px;">0</span></div>
											</div>
										
										  </div>
											<div class="stats-info center">
											  <div class="statsatks"><span class="stats-title tiny-shadow">Tropas doadas:</span>
											  <span class="stats-total ng-binding infodoadas">0</span></div>
											  <div class="statsatks"><span class="stats-title tiny-shadow">Tropas recebidas:</span>
											  <span class="stats-total ng-binding inforecebidas">0</span></div>
											  <div class="statsatks"><span class="stats-title tiny-shadow">Ataques:</span>
											  <span class="stats-total ng-binding infoataks">0</span></div>
											  <div class="statsatks"><span class="stats-title tiny-shadow">Defesas:</span>
											  <span class="stats-total ng-binding infodefesas">0</span></div>
											</div>
									</div>
									<div class="posinfoth">
										<div class="town-hall left"><img class="thlevel" src="images/carregando.gif"></div>
<div class="avatars left troops small-shadow">
										  <div class="exercitotxt">Tropas</div><br>
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
											  <div class="tropsandall" style="background-image: url('images/townhall/troops/Avatar_ElectroDragon.png'); background-size: cover; width: 42px; height: 42px;" ng-class="{'grayscale': troop.level === 0}">
												<span   class="level-shadow center ng-binding electrodrag">1</span>
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
										  <div class="exercitotxt">Feitiços</div><br>
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
										  <div class="exercitotxt">Heróis</div><br>
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
						}else{echo "Servidor indisponivel. Tente reiniciar a pagina.";}						
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