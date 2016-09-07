<?php 
class Book
{
		private function query($query){
			
			$client_id = "V9jj1_LsXcC1yH5_ORE2";
			$client_secret = "UZXCf0pQgr";
			$target = "book";			// book, movie...
			
		
			$url = "https://openapi.naver.com/v1/search/".$target.".xml";
			$url = sprintf("%s?query=%s", $url, $query);
	//		$url = sprintf("%s?query=%s&display=5&start=1&sort=sim", $url, $query);
			$is_post = true;
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, $is_post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$headers = array();
			$headers[] = "X-Naver-Client-Id: ".$client_id;
			$headers[] = "X-Naver-Client-Secret: ".$client_secret;

			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$response = curl_exec ($ch);
			curl_close ($ch);
		}
		
		
        /**
         * API 결과를 받아오기 위하여 오픈API 서버에 Request 를 하고 결과를 XML Object 로 반환하는 메소드
         * @return object
         */
        private function query($query)
        {
                $url = sprintf("%s?query=%s&target=%s&key=%s", $this->searchUrl, $query, $this->target, $this->key);
                $data =file_get_contents($url);
                $xml = simplexml_load_string($data);
                
                return $xml;
        }

        /**
         * API의 결과를 Json 으로 encode 하려 반환하는 메소드
         * XML을 직접 parsing 하지 않고 json으로 변환하여 반환한다. 
         */
        public function getBookSearch($query)
        {       $xml = $this->query($query);
                $result = json_encode($xml);

                return $result; 
        }
}       


 				
?>