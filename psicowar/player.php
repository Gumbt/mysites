<?php
$taguser = $_POST["name"];
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImIzYjBhZDE3LTBjYTYtNDFjNi04OWYyLTJjNzk5NjFkYjc1ZCIsImlhdCI6MTUzNjg4MTcwNywic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4NS4yMDEuMTEuMTgwIiwiMTg1LjIwMS4xMS4xODUiLCIxODUuMjAxLjExLjE4NiIsIjE4NS4yMDEuMTEuMTcxIiwiMTg1LjIwMS4xMS4xNzkiXSwidHlwZSI6ImNsaWVudCJ9XX0.Xlo5nwlHbLQaiATGrTyN5ya3e790y3LAG0sBd2z97P0bvYUt0Nd1a2X-yuffcCyybygxJkoxDVx_lZSD_sqajw';
//$playertag = $_GET['tag'];
$url = "https://api.clashofclans.com/v1/players/%23".$taguser;
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
	$message = substr($message, -2);
	$message = intval($message);
	$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjM1MDE4MGZjLWQ1YjEtNGNiOC04YmMzLTJiZWJlOTcxODM3YSIsImlhdCI6MTUzODY5NTk1Nywic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4NS4yMDEuMTEuMTgwIiwiMTg1LjIwMS4xMS4xNzIiLCIxODUuMjAxLjExLjE3MCJdLCJ0eXBlIjoiY2xpZW50In1dfQ.V14JLZIJgf-72gK1NJy1VuwHQQ28W8Ubbv_iTE9POFKDygpbRIsFbn9A2igeeOp00Zc-GoVgTZfLe0tCRSBMOg';
	$headers = array(
	"Accept: application/json",
	"Authorization: Bearer " . $api_key
	);
	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch2, CURLOPT_URL,$url);
	$result2 = curl_exec($ch2);
	$response = json_decode($result2,true);
	
}
if(isset($response['tag'])){
	$tag = $response['tag'];
	$name = $response['name'];
	$townHallLevel = $response['townHallLevel'];
	if($townHallLevel==12){$townHallWeaponLevel = $response['townHallWeaponLevel'];}else{$townHallWeaponLevel = 1;}
	$expLevel = $response['expLevel'];
	$trophies = $response['trophies'];
	$bestTrophies = $response['bestTrophies'];
	$warStars = $response['warStars'];
	$attackWins = $response['attackWins'];
	$defenseWins = $response['defenseWins'];
	$builderHallLevel = $response['builderHallLevel'];
	$versusTrophies = $response['versusTrophies'];
	$bestVersusTrophies = $response['bestVersusTrophies'];
	$versusBattleWins = $response['versusBattleWins'];
	$role = $response['role'];
	$donations = $response['donations'];
	$donationsReceived = $response['donationsReceived'];
	if($bestTrophies<400){
		$ligalink = "UnrankedLeague";
	}
	if($bestTrophies>=400 && $bestTrophies<500){
		$ligalink = "BronzeLeagueIII";
	}
	if($bestTrophies>=500 && $bestTrophies<600){
		$ligalink = "BronzeLeagueII";
	}
	if($bestTrophies>=600 && $bestTrophies<800){
		$ligalink = "BronzeLeagueI";
	}
	if($bestTrophies>=800 && $bestTrophies<1000){
		$ligalink = "SilverLeagueIII";
	}
	if($bestTrophies>=1000 && $bestTrophies<1200){
		$ligalink = "SilverLeagueII";
	}
	if($bestTrophies>=1200 && $bestTrophies<1400){
		$ligalink = "SilverLeagueI";
	}
	if($bestTrophies>=1400 && $bestTrophies<1600){
		$ligalink = "GoldLeagueIII";
	}
	if($bestTrophies>=1600 && $bestTrophies<1800){
		$ligalink = "GoldLeagueII";
	}
	if($bestTrophies>=1800 && $bestTrophies<2000){
		$ligalink = "GoldLeagueI";
	}
	if($bestTrophies>=2000 && $bestTrophies<2200){
		$ligalink = "CrystalLeagueIII";
	}
	if($bestTrophies>=2200 && $bestTrophies<2400){
		$ligalink = "CrystalLeagueII";
	}
	if($bestTrophies>=2400 && $bestTrophies<2600){
		$ligalink = "CrystalLeagueI";
	}
	if($bestTrophies>=2600 && $bestTrophies<2800){
		$ligalink = "MasterLeagueIII";
	}
	if($bestTrophies>=2800 && $bestTrophies<3000){
		$ligalink = "MasterLeagueII";
	}
	if($bestTrophies>=3000 && $bestTrophies<3200){
		$ligalink = "MasterLeagueI";
	}
	if($bestTrophies>=3200 && $bestTrophies<3500){
		$ligalink = "ChampionLeagueIII";
	}
	if($bestTrophies>=3500 && $bestTrophies<3800){
		$ligalink = "ChampionLeagueII";
	}
	if($bestTrophies>=3800 && $bestTrophies<4100){
		$ligalink = "ChampionLeagueI";
	}
	if($bestTrophies>=4100 && $bestTrophies<4400){
		$ligalink = "TitanLeagueIII";
	}
	if($bestTrophies>=4400 && $bestTrophies<4700){
		$ligalink = "TitanLeagueII";
	}
	if($bestTrophies>=4700 && $bestTrophies<5000){
		$ligalink = "TitanLeagueI";
	}
	if($bestTrophies>=5000){
		$ligalink = "LegendLeague";
	}
	$raio=0;
	$cura=0;
	$furia=0;
	$salto=0;
	$gelo=0;
	$veneno=0;
	$terremoto=0;
	$haste=0;
	$clone=0;
	$skeleto=0;
	$king = 0;
	$queen = 0;
	$guardian = 0;
	$tagclan = $response['clan']['tag'];
	$nameclan = $response['clan']['name'];
	$clanLevel = $response['clan']['clanLevel'];
	$badgeUrls = $response['clan']['badgeUrls']['medium'];

	if(isset($response['league']['name'])){$league = $response['league']['name'];}else{$league= "Unranked";}


	if(isset($response['heroes'][0]['level'])){$king = $response['heroes'][0]['level'];}else{$king = 0;}
	if(isset($response['heroes'][1]['level'])){$queen = $response['heroes'][1]['level'];}else{$queen = 0;}
	if(isset($response['heroes'][2]['level'])&&$response['heroes'][2]['name']=="Grand Warden"){$guardian = $response['heroes'][2]['level'];}else{$guardian = 0;}

	$f=0;
	while(isset($response['spells'][$f]['name'])&&$f<10){
		if($response['spells'][$f]['name']=="Lightning Spell"){
			$raio = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Healing Spell"){
			$cura = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Rage Spell"){
			$furia = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Jump Spell"){
			$salto = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Freeze Spell"){
			$gelo = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Poison Spell"){
			$veneno = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Earthquake Spell"){
			$terremoto = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Haste Spell"){
			$haste = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Clone Spell"){
			$clone = $response['spells'][$f]['level'];
		}
		if($response['spells'][$f]['name']=="Skeleton Spell"){
			$skeleto = $response['spells'][$f]['level'];
		}
		$f++;
	}
	$barbaro=0;$arqueira=0;$goblin=0;$gigante=0;$quebramuro=0;$balao=0;$mago=0;$curadora=0;$dragao=0;$pekka=0;$minion=0;$corredor=0;$valk=0;$golem=0;$bruxa=0;$lava=0;$lanca=0;$bbdragao=0;$mineiro=0;$electrodrag=0;
	$i=0;
	while(isset($response['troops'][$i]['name'])&&$i<40){
		if($response['troops'][$i]['name']=="Barbarian"){
			$barbaro = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Archer"){
			$arqueira = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Goblin"){
			$goblin = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Giant"){
			$gigante = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Wall Breaker"){
			$quebramuro = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Balloon"){
			$balao = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Wizard"){
			$mago = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Healer"){
			$curadora = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Dragon"){
			$dragao = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="P.E.K.K.A"){
			$pekka = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Minion"){
			$minion = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Hog Rider"){
			$corredor = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Valkyrie"){
			$valk = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Golem"){
			$golem = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Witch"){
			$bruxa = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Lava Hound"){
			$lava = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Bowler"){
			$lanca = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Baby Dragon" && $response['troops'][$i]['village']=="home"){
			$bbdragao = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Miner"){
			$mineiro = $response['troops'][$i]['level'];
		}
		if($response['troops'][$i]['name']=="Electro Dragon"){
			$electrodrag = $response['troops'][$i]['level'];
		}
		$i++;
	}


	curl_close($ch);
	$success = 'success';
	echo json_encode(array("success" => $success,
	"bestTrophies" => $bestTrophies,
	"warStars" => $warStars,
	"attackWins" => $attackWins,
	"defenseWins" => $defenseWins,
	"donations" => $donations,
	"donationsReceived" => $donationsReceived,
	"ligalink" => $ligalink,

	"townHallLevel" => $townHallLevel,
	"townHallWeaponLevel" => $townHallWeaponLevel,
	"taguser" => $taguser,
	"king" => $king,
	"queen" => $queen,
	"guardian" => $guardian,

	"raio" => $raio,
	"cura" => $cura,
	"furia" => $furia,
	"salto" => $salto,
	"gelo" => $gelo,
	"veneno" => $veneno,
	"terremoto" => $terremoto,
	"haste" => $haste,
	"clone" => $clone,
	"skeleto" => $skeleto,

	"barbaro" => $barbaro,
	"arqueira" => $arqueira,
	"goblin" => $goblin,
	"gigante" => $gigante,
	"quebramuro" => $quebramuro,
	"balao" => $balao,
	"mago" => $mago,
	"curadora" => $curadora,
	"dragao" => $dragao,
	"pekka" => $pekka,
	"minion" => $minion,
	"corredor" => $corredor,
	"valk" => $valk,
	"golem" => $golem,
	"bruxa" => $bruxa,
	"lava" => $lava,
	"lanca" => $lanca,
	"bbdragao" => $bbdragao,
	"mineiro" => $mineiro,
	"electrodrag" => $electrodrag


	));
}else{
$success="erro";
echo json_encode(array("success" => $success));
}
?>