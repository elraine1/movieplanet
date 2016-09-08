<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="resources/css/myTheme.css">

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>

<script>

// JAVASCRIPT 영역 
function checkEnter(e){
 e = e || event;
 var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
 return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
}
	
$(document).ready(function(){

// .load() 

	document.querySelector('form').onkeypress = checkEnter;


	$("#movie_search_btn").click(function(){
		var action = $("#movie_search_form").attr("action");
		var form_data = {
			"target": $("#target").val(),
			"query": $("#query").val(),	
			"country": $("#country").val(),
			"genre": $("#genre").val()
		};
		
		$.ajax({
			
			// 한 번에 10개씩 밖에 안나옴! 
			// api request 옵션 손볼 것. display, start, .. default option 임.
			
			dataType: "xml",
			type: "POST",
			async: false,
			url: action,
			data: form_data,
			success: function(result){
//				alert(result);
				var xml = $(result);
				var items = xml.find("item");
				var naverHtml = "";
				
				var pubDate;
				var movieTitle;
				var movieSubtitle;
				var movieDirector;
				var movieActors;
				var moviePoster;
				var movieRating;
				
//				alert(items.find("link").text());
				for(var i=0; i < items.length; i++){
					
					// 불러온 값
					// naverLink = $(items[i]).find("link").text();
					
					pubDate = parseInt($(items[i]).find("pubDate").text());
					movieTitle = $(items[i]).find("title").text();
					movieSubtitle = $(items[i]).find("subtitle").text();
					movieDirector = $(items[i]).find("director").text();
					movieActors = $(items[i]).find("actor").text();
					moviePoster = $(items[i]).find("image").text();
					movieRating = $(items[i]).find("userRating").text();
					
					var str = movieTitle.replace("<b>", "");
					str = str.replace("</b>", "");
					
					// html 만들기
					naverHtml += "<tr>";
					naverHtml += "<td class='img_td'><img src='" + moviePoster + "' alt='Image not found' onerror=\"this.onerror=null;this.src='resources/images/no_img.png';\"></td>";
					naverHtml += "<td class='movieTitle'><span class='pubDate'>(" + pubDate + ")</span><br>";
					naverHtml += 			"<a href=\"movie_detail.php?movieTitle=" + str + "&pubDate=" + pubDate + "\">" + movieTitle + "</a><br>:" + movieSubtitle + "</td>";
					naverHtml += "<td>" + movieDirector + "</td>";
					naverHtml += "<td>" + movieActors + "</td>";
					naverHtml += "<td>" + movieRating + "</td>";
					naverHtml += "</tr>";
					
				}
				
				// ++검색결과 존재하지 않을 시 처리 할 것.
				var rsSpan = $("#rs_count");
				rsSpan.empty();
				rsSpan.append("<b>총 " + items.length + "건의 검색 결과가 있습니다. </b>");
				
//				var oldlist = $("#oldlist");
//				oldlist.empty();
				
				var movieList = $("#movieList");
				movieList.empty();
				movieList.append(naverHtml);
				
//				alert(result);
			},
			error: function(xhr){
				alert(xhr.responseText);
//				alert('Error');
			},
			timeout : 3000
		});
		
	});
});

	
	
</script>

</head>
<body>

	<?php require_once('template/header.php'); ?>

	<div id="content_wrap">
		<div id="content_row1">
			<div class="search_book">
				<fieldset class="srch">
					<legend>영화 검색</legend>
					<div id="content_1">			
						<form action="movie_proxy.php" id="movie_search_form" method="POST">
							<select id="country">
								<option value="" selected>::: 국가 :::</option>
								<?php 
									$country = array("KR" => "한국", "JP" => "일본", "US" => "미국", "HK" => "홍콩", 
													"GB" => "영국", "FR" => "프랑스", "ETC" => "기타");
									foreach($country as $code => $countryName){
										printf("<option value=%s>%s</option>", $code, $countryName);
									}
								?>
							</select>
							
							<select id="genre">
								<option value="" selected>::::: 장르 :::::</option>
								<?php 
									$genre = array("드라마", "판타지", "서부", "공포", "로맨스", "모험", "스릴러", "느와르", "컬트", "다큐멘터리", 
									"코미디", "가족", "미스터리", "전쟁", "애니메이션", "범죄", "뮤지컬", "SF", "액션", "무협", 
									"에로", "서스펜스", "서사", "블랙코미디", "실험", "영화카툰", "영화음악", "영화패러디");
									
									for($i=0; $i<count($genre); $i++){
										printf("<option value=%d>%s</option>", $i+1, $genre[$i]);
									}
								?>
							</select>
							
							<input type="hidden" id="target" name="target" value="movie">
							<input type="text" id="query" name="query">
							<input id="movie_search_btn" type="button" value="검색">
						</form>
					</div>
				</fieldset>
				
				<div id="movie_result">
					<br>
					<table id="movieTable">
						<span id="rs_count"></span>
						
						<colgroup>
								<col width="10%">
								<col width="25%">
								<col width="30%">
								<col width="30%">
								<col width="10%">
						</colgroup>
						<thead>
								<tr>
								<th scope="col">포스터</th>
								<th scope="col">영화제목</th>
								<th scope="col">감독</th>
								<th scope="col">배우</th>
								<th scope="col">평점</th>
								</tr>
						</thead>
						<tbody id="movieList">
								<tr id="oldlist" class="__oldlist" style="">
										<td colspan="5" align="center">검색 결과가 없습니다.</td>
								</tr>
						</tbody>
					
					</table>
					<br><br>
				</div>
			</div>
		</div>
	</div>
		
	<?php require_once('template/footer.php'); ?>
	
</body>
</html>
	
