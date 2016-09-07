<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="resources/css/myTheme.css">

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>

<script>
	// JAVASCRIPT 영역 
</script>

<style type="text/css">
#content_1{
	height: 400px;
	border: 1px solid black;
}

</style>

<script>

$(document).ready(function(){

// .load() 

	document.querySelector('form').onkeypress = checkEnter;


	$("#news_search_btn").click(function(){
		var action = $("#news_search_form").attr("action");
		var form_data = {
			"target": $("#target").val(),
			"query": $("#query").val()
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
				var naverLink;
				var naverTitle;
				var naverDate;
				var naverContent;
				
//				alert(items.find("link").text());
				for(var i=0; i < items.length; i++){
					
					// 불러온 값
					// naverLink = $(items[i]).find("link").text();
					// 뉴스 자료 불러오기.
					
					pubDate = parseInt($(items[i]).find("pubDate").text());
					movieTitle = $(items[i]).find("title").text();
					movieSubtitle = $(items[i]).find("subtitle").text();
					movieDirector = $(items[i]).find("director").text();
					movieActors = $(items[i]).find("actor").text();
					moviePoster = $(items[i]).find("image").text();
					movieRating = $(items[i]).find("userRating").text();
					
					
					// html 만들기
					naverHtml += "<tr>";
					naverHtml += "<td class='img_td'><img src='" + moviePoster + "' alt='Image not found' onerror=\"this.onerror=null;this.src='resources/images/no_img.png';\"></td>";
					naverHtml += "<td class='movieTitle'><span class='pubDate'>(" + pubDate + ")</span><br>";
					naverHtml += 			"<a href=\"#\">" + movieTitle + "</a><br>:" + movieSubtitle + "</td>";
					naverHtml += "<td>" + movieDirector + "</td>";
					naverHtml += "<td>" + movieActors + "</td>";
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

		
		<div id="content_1">
			<form action="news_proxy.php" id="news_search_form" method="POST">
				<input type="hidden" id="target" name="target" value="news">
				<input type="text" id="query" name="query">
				<input id="news_search_btn" type="button" value="검색">
			</form>
		</div>
				
		<div id="content_2">
			
 			<!--
			<form action="naver_movie.php" method="POST">
			영화
			<input type="hidden" name="target" value="movie">
			<input type="text" name="query">
			<input type="submit">
			</form>
			<a href="naver_movie.php"><input type="button" value="영화검색"> </a>
			-->
		</div>
	</div>
	
	<?php require_once('template/footer.php'); ?>
	
</body>
</html>
	
