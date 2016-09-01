<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>



</head>
<body>

<h3>Hello</h3>

<form action="#" method="GET">
<input type="text" name="search">
<input type="submit">

</form>


<?php
	$client_id = "V9jj1_LsXcC1yH5_ORE2";
	$client_secret = "UZXCf0pQgr";
	$target = "movie";
	$url = "https://openapi.naver.com/v1/search/" . $target . ".xml";
//	$url = "https://openapi.naver.com/v1/search/movie.xml";
	$url = sprintf("%s?query=%s&display=5&start=1&sort=sim", $url, $query);
	
	$is_post = true;
	
	/* 2016. 09. 01.  여기부터.
	$fields = array('speaker'=>'mijin','speed'=>'0', 'text'=>$text);
	$postvars = '';
	foreach($fields as $key=>$value) {
		$postvars .= $key . "=" . $value . "&";
	}
	*/
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, $is_post);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$headers = array();
	$headers[] = "X-Naver-Client-Id: " . $client_id;
	$headers[] = "X-Naver-Client-Secret: " . $client_secret;
	 
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	 
	$response = curl_exec ($ch);
	curl_close ($ch);
 	
	echo "<br>sdfasdf";
	print_r($response);
?>


</body>
</html>
	
