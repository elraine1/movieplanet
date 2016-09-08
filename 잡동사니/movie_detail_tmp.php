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

function getGetParams(){
	var parts = window.location.search.substr(1).split("&");
	var $_GET = {};
	for (var i = 0; i < parts.length; i++) {
		var temp = parts[i].split("=");
		$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
	}

	return $_GET;
}
	
$(document).ready(function(){

/*
	var $_GET = getGetParams();
	var news_url = "news_proxy.php";
	var form_data = {
		"target": "news",
		"query": "영화 " + $_GET.movieTitle,	
	};
	
	$.ajax({
		// 한 번에 10개씩 밖에 안나옴! 
		// api request 옵션 손볼 것. display, start, .. default option 임.
		
		dataType: "xml",
		type: "POST",
		async: false,
		url: news_url,
		data: form_data,
		success: function(result){
//			alert(result);
			var xml = $(result);
			var items = xml.find("item");
			var naverHtml = "";
					
			var lastBuildDate;
			var total;
			var display;
			
			var newsTitle;
			var newsOriginalLink;
			var newsNaverLink;
			var newsDescription;
			var newsPubDate;
//			alert(items.length);
			for(var i=0; i < items.length; i++){
				
				// 불러온 값
				// naverLink = $(items[i]).find("link").text();
				
				lastBuildDate = xml.find("lastBuildDate").text();
				total = xml.find("total").text();
				display = xml.find("display").text();

				newsTitle = $(items[i]).find("title").text();
				newsOriginalLink = $(items[i]).find("originallink").text();
				newsNaverLink = $(items[i]).find("link").text();
				newsDescription = $(items[i]).find("description").text();
				newsPubDate = $(items[i]).find("pubDate").text();
				
				// html 만들기
				naverHtml += "<table>";
				naverHtml += "<tr><td width='5%'>" + (i+1) + "</td><td width='70%'><a href='" + newsOriginalLink + "'>" + newsTitle + "</a></td><td width='20%'>" + newsPubDate + "</td></tr>";
				naverHtml += "<tr height='100px'><td colspan='3'>" + newsDescription + "</td></tr>";
				naverHtml += "</table><br>";
			}
			
//				var oldlist = $("#oldlist");
//				oldlist.empty();
			
			var newsList = $("#newsList");
			newsList.empty();
			newsList.append(naverHtml);
			
//				alert(result);
		},
		error: function(xhr){
//			alert('Error!');
			alert(xhr.responseText);
//				alert('Error');
		},
		timeout : 3000
	});
	*/
});

	
	
</script>


<?php 
	require_once('classes/NaverProxy.php');
	
	$target = "news";
	$query = "영화 " . $_GET['movieTitle'];
	
	$naverproxy = new NaverProxy();
	$newsList = simplexml_load_string($naverproxy -> queryNaver($query, $target, "", "")) -> channel -> item;
//	print_r($newsList[0]);

//	$daumproxy = 다음 영화 API 
	$movieDetail = 
?>


</head>
<body>

	<?php require_once('template/header.php'); ?>

	<div id="content_wrap">
		<div id="content_row1">
			<h2><span>영화 상세 페이지</span></h2>
			<div id="movie_detail">
				<br><br>
				<h3>영화 상세 정보(다음 영화 API)</h3>
				<br><br>
				<?php
				
//				echo $_GET['pubDate'] . " " . $_GET['movieTitle'];
				
				?>
				
			</div>
			
			<div id="content_row2">
				<h3>관련 뉴스</h3>
				<table id="newsTable">
					<span id="rs_count"></span>

					<tbody id="newsList">
						
					<?php
						if(!(count($newsList) > 0)){
							printf("<tr><td colspan='5' align='center'>검색 결과가 없습니다.</td></tr>");
						}else {
					
							for($i=0; $i< count($newsList); $i++){
								printf("<tr><td><a href='%s'><b>%s</b></a></td></tr>", $newsList[$i]->link, $newsList[$i] -> title);
								printf("<tr><td>%s</td></tr>", $newsList[$i]->description);
							}
						}
					
					?>
						<tr>
							
						</tr>
						
					</tbody>
				</table>
				<br><br>
			</div>
				
			
		</div>
		
		<div id="content_row3">
			
			관련 SNS 
			
			
		</div>
	</div>
		
	<?php require_once('template/footer.php'); ?>
	
</body>
</html>
	
