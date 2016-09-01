 

<?php
 // php 실행결과response가 xml임을 브라우저에게 알려줌.

header('Content-type:text/xml');

class NaverProxy {
   
	public function queryNaver($query, $target) {
		
	   $client_id = "개발자센터에서 받은 클라이언트아이디";
	   $client_secret = "개발자센터에서 받은 시크릿코드";
	   $url = "https://openapi.naver.com/v1/search/".$target.".xml";
	   $url = sprintf("%s?query=%s&display=5&start=1&sort=sim",  $url, $query);
	   $is_post = true;
	   
	   $ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL, $url);
	   curl_setopt($ch, CURLOPT_GET, $is_post);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	   
	   $headers = array();
	   $headers[] = "X-Naver-Client-Id: ".$client_id;
	   $headers[] = "X-Naver-Client-Secret: ".$client_secret;
	   
	   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	   
	   $data = curl_exec ($ch);
	   curl_close ($ch);
	   
	   return $data;
       }
	}

 

$naverproxy = new NaverProxy();

 

echo $naverproxy -> queryNaver($_POST['query'], $_POST['target']);
//http://www.buskersbook.com/buskers/bb_codelab/189
//http://forum.developers.naver.com/t/api/4218/3
?>

 
