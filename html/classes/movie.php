<?php
	class movieInfo{
		
		public function queryKobica($query){
			$key = '29321a1defe83f76ada504206f1aa602';
			$query = urlencode($query);
			
			
			
		}
		
	}

	
	<?php
class NaverProxy {
   
	public function queryNaver($query, $target, $country, $genre) {
		
		$query = urlencode($query);
		$client_id = "V9jj1_LsXcC1yH5_ORE2";
		$client_secret = "UZXCf0pQgr";

		$url = "https://openapi.naver.com/v1/search/".$target.".xml";		
		if($target === 'movie'){
			$url = sprintf("%s?query=%s&country=%s&genre=%s", $url, $query, $country, $genre);
		}else if($target === 'news'){
			$url = sprintf("%s?query=%s&display=5", $url, $query);
		}
		
//		$url = sprintf("%s?query=%s&display=5&start=1&sort=sim", $url, $query);
		$is_post = false;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, $is_post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 함수 실행 성공 시, string 타입으로 데이터를 읽어오고 실패시 false 를 리턴한다. 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$headers = array();
		$headers[] = "X-Naver-Client-Id: " . $client_id;
		$headers[] = "X-Naver-Client-Secret: " . $client_secret;

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = curl_exec ($ch);
		curl_close ($ch);
		return $data;
	}
}

?>

