<?php
require_once("adm/banco/config.php");
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImIzYjBhZDE3LTBjYTYtNDFjNi04OWYyLTJjNzk5NjFkYjc1ZCIsImlhdCI6MTUzNjg4MTcwNywic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4NS4yMDEuMTEuMTgwIiwiMTg1LjIwMS4xMS4xODUiLCIxODUuMjAxLjExLjE4NiIsIjE4NS4yMDEuMTEuMTcxIiwiMTg1LjIwMS4xMS4xNzkiXSwidHlwZSI6ImNsaWVudCJ9XX0.Xlo5nwlHbLQaiATGrTyN5ya3e790y3LAG0sBd2z97P0bvYUt0Nd1a2X-yuffcCyybygxJkoxDVx_lZSD_sqajw';

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
	$message = substr($message, -2);
	$message = intval($message);
	$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjM1MDE4MGZjLWQ1YjEtNGNiOC04YmMzLTJiZWJlOTcxODM3YSIsImlhdCI6MTUzODY5NTk1Nywic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4NS4yMDEuMTEuMTgwIiwiMTg1LjIwMS4xMS4xNzIiLCIxODUuMjAxLjExLjE3MCJdLCJ0eXBlIjoiY2xpZW50In1dfQ.V14JLZIJgf-72gK1NJy1VuwHQQ28W8Ubbv_iTE9POFKDygpbRIsFbn9A2igeeOp00Zc-GoVgTZfLe0tCRSBMOg';
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
if(isset($response) && !isset($response['reason']) && isset($response['tag'])){
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
	$clanVersusPoints = $response['clanVersusPoints'];
}else{
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql2="SELECT * FROM clan WHERE tag=?";
	$t2 = '#'.$t;
	$q = $pdo->prepare($sql2);
	$q->execute(array($t2));
	$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
	$tag = $data["tag"];
	$name = $data["nome"];
	$type = $data["tipo"];
	$descri = $data["descricao"];
	$local = $data["local"];
	$icone = $data["icone"];
	$clanlvl = $data["lvl"];
	$clantroph = $data["trofeus"];
	$members = $data["membros"];
	$warwins = $data["wins"];
	$warfrequency = $data["frequencia"];
	$requiredtrophies = $data["requiredtrophies"];
	$clanVersusPoints = $data['clanVersusPoints'];
	Database::disconnect(); 
	/*$tag = "#2LULCGP8";
	$name = "Psicowar";
	$type = "inviteOnly";
	$descri = "Melhor clan do clash of clans. Servidor indisponivel no momento";
	$local = "Brazil";
	$icone = "https://api-assets.clashofclans.com/badges/200/EhsMhDtdX5YOz-lgliBXLNAiaFC7s_2tYywJp-CZ0MQ.png";
	$clanlvl = 15;
	$clantroph = 0;
	$members = 0;
	$warwins = 0;
	$warfrequency = "always";
	$requiredtrophies = 4200;*/
}

?>