<?php
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjgzY2ZkMzQ5LTM2MTgtNDA1Yi1iZmY0LTFhMjY5ZGE2ZWY0ZSIsImlhdCI6MTUyNDQ0MDUwMCwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTEiLCIzMS4xNzAuMTYxLjk0IiwiMzEuMTcwLjE2MS44OSIsIjMxLjE3MC4xNjEuOTIiLCIzMS4xNzAuMTYxLjk4Il0sInR5cGUiOiJjbGllbnQifV19.eDCsWdz8ZT_7hrZAbp5PJYQXC-d0SdLW4-R__5sxEBwMfR6jQDW8-dQZ93VnxkVdJGnwsME_zSAE2B6asvHABw';

$urllocal = 'https://api.clashofclans.com/v1/locations/32000038/rankings/clans';
$headers = array(
"Accept: application/json",
"Authorization: Bearer " . $api_key
);
$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch3, CURLOPT_URL,$urllocal);
$result = curl_exec($ch3);
$response3 = json_decode($result,true);
if(isset($response['message'])){
	$message = $response['message'];
	$message = substr($message, -2);
	$message = intval($message);
	if($message==86 || $message==87 || $message==88 || $message==90 || $message==93){
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjJjNjhlN2YwLWExNTItNDUwMS1iNGQ1LTIyMDVkMzNkMmFiMSIsImlhdCI6MTUyMzcyODU0NSwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuODYiLCIzMS4xNzAuMTYxLjg3IiwiMzEuMTcwLjE2MS44OCIsIjMxLjE3MC4xNjEuOTAiLCIzMS4xNzAuMTYxLjkzIl0sInR5cGUiOiJjbGllbnQifV19.s0cxZo4qZlnmt5AO1fDd1H8tNpoFLLWAZtTAn7sefFo49rG4-faWYXAxl6xnSLdAQIomFG9N0fqlxgRcJeV21w';
	}
	if($message==99 || $message==97 || $message==96 || $message==95 || $message==1){//psicowar3 editado1
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjY5Nzk3YmNiLTNlNDgtNDdmNC1hZGY0LTA5ZjhiZTAyZDQ1OSIsImlhdCI6MTUyNDQ0MDU2NCwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuOTkiLCIzMS4xNzAuMTYxLjk3IiwiMzEuMTcwLjE2MS45NiIsIjMxLjE3MC4xNjEuOTUiLCIzMS4xNzAuMTYxLjEwMSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.k9kT07WLKvVnjr6DYuY15wO5OHaXqFX_i9qW-W9f7znKHd7jGflNsKhgRTTWiw2Di5E4WTTJByopRiBm83pDfw';
	}
	if($message==0 || $message==2 || $message==3 || $message==4 || $message==5){//psicowar4
		$api_key2 = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjViMDI5ZjZjLTNmMTItNDU1Zi1hNGYwLTZlOWUxMTBkNGRiMCIsImlhdCI6MTUyMzcyODc0Miwic3ViIjoiZGV2ZWxvcGVyLzk0NTMxNzc1LWQ3MDEtMjdiMS0xZGMwLTU5ZjE1ZTFjYjA0NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjEuMTAwIiwiMzEuMTcwLjE2MS4xMDIiLCIzMS4xNzAuMTYxLjEwMyIsIjMxLjE3MC4xNjEuMTA0IiwiMzEuMTcwLjE2MS4xMDUiXSwidHlwZSI6ImNsaWVudCJ9XX0.MrvtBRlVH9tesfkXiZMxzyzFB7pMGzuEusK0gFkDSZ58v0vbf_kCEQjpYwWDi2r2jFaiiHCbu3QhizpVZZU_Pw';
	}
	$headers = array(
	"Accept: application/json",
	"Authorization: Bearer " . $api_key2
	);
	$ch4 = curl_init();
	curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch4, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch4, CURLOPT_URL,$url);
	$result = curl_exec($ch4);
	$response3 = json_decode($result,true);
	
}
if(isset($response) && !isset($response['reason'])){
	$cont=0;
	while ($cont<200)
	{	
		if(str_replace('#','',$response['items'][$cont]['tag'])=="2LULCGP8"){
			$posi = $cont + 1;
		}
		$cont++;
	}
}
curl_close($ch2);

?>