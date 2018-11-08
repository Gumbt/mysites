<?php
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjQxNDdlYzNkLTVlNTQtNGE0MS1iMDAwLTE3NGEyMWVkZWU2OSIsImlhdCI6MTUyMzY1NzAxNSwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTIiLCIzMS4xNzAuMTYxLjEwMSIsIjMxLjE3MC4xNjEuOTQiLCIzMS4xNzAuMTYxLjkxIiwiMzEuMTcwLjE2MS44OSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.8mNIu67a9riqPIxJI1WuzZbjBP3uS-jqnFJ9fsCbFD3svygBlesKpIT7OsvvCZUJmkEIAfYQ8ETksFoJF6ujUg';
$clanid = "CRCUPU82";//id do clan que voce quer ver
$url = 'https://api.clashofclans.com/v1/clans/%23'.$clanid.'/currentwar';

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
$i = 0;
while($i<$response['teamSize']){//pegar todos os jogadores do clan
	echo "<div style='border:1px solid black;'>";
	echo "O jogador ".$response['clan']['members'][$i]['name'];
	echo "<br><b>Defesa</b>";
	if($response['clan']['members'][$i]['opponentAttacks']>0){//verifica se ele tomou ataque
		echo "<br>Foi atacado por ".$response['clan']["members"][$i]['bestOpponentAttack']['attackerTag'];//mostra a tag de quem atacou ele
		echo " e tomou ".$response['clan']['members'][$i]['bestOpponentAttack']['stars'] . " estrelas e ". $response['clan']['members'][$i]['bestOpponentAttack']['destructionPercentage']."%";
	}else{
		echo "<br>Não recebeu ataques";
	}
	echo "<br><b>Ataque</b>";
	if(isset($response['clan']["members"][$i]['attacks'])){//verifica se ele atacou
		$cont = 0;
		while($cont<2){//cada jogador pode faze 2 atacks
			if(isset($response['clan']['members'][$i]['attacks'][$cont])){//verificar se os 2 ataques foram feitos
				echo "<br>Atacou ".$response['clan']['members'][$i]['attacks'][$cont]['attackerTag'];//mostra a tag de quem ele atacou
				echo " com ".$response['clan']['members'][$i]['attacks'][$cont]['stars'] . " estrelas e ". $response['clan']['members'][$i]['attacks'][$cont]['destructionPercentage']."%";
			}
			$cont++;
		}
		echo "<br>";
	}else{
		echo "<br>Não atacou<br>";
	}
	echo "</div><br>";
	$i++;
}
curl_close($ch);
?>