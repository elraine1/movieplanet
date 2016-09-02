<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>



</head>
<body>

<h3>Hello</h3>

영화
<form action="movie_proxy.php" method="POST">
<input type="hidden" name="target" value="movie">
<input type="text" name="query">
<input type="submit">
</form>

뉴스
<form action="movie_proxy.php" method="POST">
<input type="hidden" name="target" value="news">
<input type="text" name="query">
<input type="submit">
</form>




<?php

	$client_id = "V9jj1_LsXcC1yH5_ORE2";
	$client_secret = "UZXCf0pQgr";

	$query=urlencode("마트");
	$display="5";
	$start="1";
	$is_post = true;
	$output="xml" ;//json,xml

	$url="https://openapi.naver.com/v1/search/local.xml";
	$qry_str = "?&query=".$query."&start=".$start."&display".$display."&output".$output;
	$headers = array("X-Naver-Client-Id: ".$client_id, "X-Naver-Client-Secret: ".$client_secret); //ClientID, SECRET

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url.$qry_str);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//	curl_setopt($ch, CURLOPT_GET, $is_post);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec ($ch);
	curl_close ($ch);

	echo $response;
?>


</body>
</html>
	
