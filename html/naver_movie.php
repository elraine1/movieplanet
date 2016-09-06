<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="resources/css/myTheme.css">

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>

<script>
	// JAVASCRIPT 영역 

$(document).ready(function(){

	$("#movie_search_btn").click(function(){
		var action = $("#movie_search_form").attr("action");
		var form_data = {
			"target": $("#target").val(),
			"query": $("#query").val(),	
			"country": $("#country").val(),
			"genre": $("#genre").val()
		};
		
		$.ajax({
			
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
				var naverLink;
				var naverTitle;
				var naverDate;
				var naverContent;
				
//				alert(items.find("link").text());
				for(var i=0; i < items.length; i++){
					
					// 불러온 값
					// naverLink = $(items[i]).find("link").text();
					
					pubDate = parseInt($(items[i]).find("pubDate").text());
					movieTitle = $(items[i]).find("title").text();
					movieSubtitle = $(items[i]).find("subtitle").text();
					movieDirector = $(items[i]).find("director").text();
					movieActor = $(items[i]).find("actor").text();
					moviePoster = $(items[i]).find("image").text();
					movieRating = $(items[i]).find("userRating").text();
					
					
					// html 만들기
					naverHtml += "<tr>";
					naverHtml += "<td class='img_td'><img src='" + moviePoster + "' alt='Image not found' onerror=\"this.onerror=null;this.src='resources/images/no_img.png';\"></td>";
					naverHtml += "<td>(" + pubDate + ")" + movieTitle + "<br>:" + movieSubtitle + "</td>";
					naverHtml += "<td>" + movieDirector + "</td>";
					naverHtml += "<td>" + movieActor + "</td>";
					naverHtml += "<td>" + movieRating + "</td>";
					naverHtml += "</tr>";
					
				}
				
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
									<option value="KR">한국</option>
									<option value="JP">일본</option>
									<option value="US">미국</option>
									<option value="HK">홍콩</option>
									<option value="GB">영국</option>
									<option value="FR">프랑스</option>
									<option value="ETC">기타</option>
								</select>
								
								<select id="genre">
									<?php 
									
									//	for();
									
									// 한 번에 10개씩 밖에 안나옴! 
									// api request 옵션 손볼 것. display, start, .. default option 임.
									
									?>
							
									<option value="" selected>::::: 장르 :::::</option>
									<option value="1">드라마</option>
									<option value="2">판타지</option>
									<option value="3">서부</option>
									<option value="4">공포</option>
									<option value="5">로맨스</option>
									<option value="6">모험</option>
									<option value="7">스릴러</option>
									<option value="8">느와르</option>
									<option value="9">컬트</option>
									<option value="10">다큐멘터리</option>
									<option value="11">코미디</option>
									<option value="12">가족</option>
									<option value="13">미스터리</option>
									<option value="14">전쟁</option>
									<option value="15">애니메이션</option>
									<option value="16">범죄</option>
									<option value="17">뮤지컬</option>
									<option value="18">SF</option>
									<option value="19">액션</option>
									<option value="20">무협</option>
									<option value="21">에로</option>
									<option value="22">서스펜스</option>
									<option value="23">서사</option>
									<option value="24">블랙코미디</option>
									<option value="25">실험</option>
									<option value="26">영화카툰</option>
									<option value="27">영화음악</option>
									<option value="28">영화패러디</option>
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
										<td colspan="7" align="center">검색 결과가 없습니다.</td>
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
	
