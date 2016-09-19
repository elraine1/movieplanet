<?php
class kobisProxy {
   
	public function queryKobis($movieNm) {
		
		$movieNm = urlencode($movieNm);
		$client_key = '29321a1defe83f76ada504206f1aa602';
		// http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.xml?&key=29321a1defe83f76ada504206f1aa602&curPage=1&movieNm=%EB%B2%A4%ED%97%88
		$url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.xml";
		$url = sprintf("%s?key=%s&curpage=%d&movieNm=%s", $url, $client_key, 1, $movieNm);
		$is_post = false;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, $is_post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 함수 실행 성공 시, string 타입으로 데이터를 읽어오고 실패시 false 를 리턴한다. 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$headers = array();
		$headers[] = "Content-Type: " . "application/json";
		$headers[] = "Accept: " . "application/json";

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = curl_exec ($ch);
		curl_close ($ch);
		return $data;
	}
}

?>