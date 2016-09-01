<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>



<script>

$(document).ready(function(){
	$("#OauthClick").click(function(){
		window.open('https://api.instagram.com/oauth/authorize/?client_id=e872a91e6ab94c08b24dc924cf6d3b34&redirect_uri=http://127.0.0.1:8084/&response_type=code');
	});
});
</script>

</head>
<body>

<h3>Hello</h3>
<input type="button" id="OauthClick" name="OauthClick" value="권한 받기">


<form action="#" method="GET">
<input type="text" name="search">
<input type="submit">

</form>


<?php
	
	function getAccessToken()
	{
		if(isset($_GET['code'])) {
			$code = $_GET['code'];
			$url = "https://api.instagram.com/oauth/access_token";
			$access_token_parameters = array (
				'client_id'		=> 'e872a91e6ab94c08b24dc924cf6d3b34',
				'client_secret'	=> '9298a06c5fa74587bd3fbcc5ba8cb16c',
				'grant_type'	=> 'authorization_code',
				'redirect_uri'	=> 'http://127.0.0.1:8084/',
				'code'		=> $code
			);

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_parameters);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($curl);

			curl_close($curl);
			$arr = json_decode($result, true);
			
			//print_r($arr);
			
			echo "access_Token: " . $arr['access_token'];
			echo "<br/>";
			echo "user_name: " . $arr['user']['username'];
			
		}
		return $arr;
	}


	$arr = getAccessToken();


	$client_id = "e872a91e6ab94c08b24dc924cf6d3b34";
	$client_secret = "9298a06c5fa74587bd3fbcc5ba8cb16c";
	$access_token = $arr['access_token'];

	$_source=file_get_contents("https://api.instagram.com/v1/users/self/media/recent?client_id=" . $client_id . "&access_token=" . $access_token . "&count=6");
	$_data=json_decode($_source);
	$json=$_data->data;
	
//	print_r($json);
echo "<br>";
	foreach($json as $data) {
		echo "<div style=\"float:left;margin:5px;\"><a href=\"" . $data->link."\" target=\"_blank\"><img src=\"" . $data->images->thumbnail->url . "\" class=\"image-style1 respond-img\"></a></div>";
	}
?>


</body>
</html>
	
