<!DOCTYPE html>
<!--[if IE 7 ]> <html class="no-js ie ie7 lte7 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie ie8 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 9 ]> <html class="no-js ie ie9 lte9>" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
<head data-live-domain="api.jquery.com">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>영화진흥위원회-일별박스오피스</title>
<meta name="author" content="jQuery Foundation - jquery.org">
<meta name="description" content="jQuery: The Write Less, Do More, JavaScript
Library">
<meta name="viewport" content="width=device-width">
<script src="/jquery/jquery-1.11.2.js"></script>
<meta name="generator" content="WordPress 4.0" />

<style type="text/css">
#result {
	width: 900px;
	height: 600px;
}
div div {
	width: 300px;
	height: 30px;
	outline: 1px solid;
	float: left;
}
</style>

<script>

function left_pad(number){
	
	var output = '';
	if(number.length == 1){
		output = '0' + number;
	}else{
		output = number;
	}
	return output;
}

function jsonCallback(json){
	console.log(json);
}

$(document).ready(function() {
	
	$("#btnSearch").click(function() {
	//alert('호출시작');
	//MTI3LTE0MTQ5MjI1ODcyODgtNjc0YmI4OTktNTJmZS00M2Y4LThiYjgtOTk1MmZlNzNmOGE3
	//NC0xNDEzMTczNTgxNTgzLTEzZWZmMThhLTMxYTQtNGMwMC1hZmYxLThhMzFhNGFjMDA5Yg==
	//processData: false,
		if($("#selGet").val()=='')
		{
			alert('기본그룹을 선택하세요!!');
			return false;
		}
		if($("#txtKey").val()=='')
		{
			alert('발급 받은 키를 입력하여주세요!!');
			return false;
		}
		$("#header").html("상태:처리중입니다...");
		var key = $("#txtKey").val();
		var curPage = $("#txtcurPage").val();
		var url = $("#txtUrl").val();// + "key=" + key + "&targetDt=" + ymd;
		var movieNm = $("#txtmovieNm").val();
		// xhrObj.setRequestHeader("x-waple-authorization",key);
		$.ajax({
			beforeSend: function(xhrObj){
					xhrObj.setRequestHeader("Content-Type","application/json");
					xhrObj.setRequestHeader("Accept","application/json");
				},	
			type: "GET",
			url: url,
			dataType: "text",
//			jsonpCallback: "jsonCallback",
			data: {key:key, curPage:curPage, movieNm:movieNm},
			async: false,
			success: function(data){
				alert('123');
				/*
				$tag = $("#result");
				$("#header").html("총건수 : " + data.movieListResult.totCnt + "건");
				//alert(data.boxOfficeResult.dailyBoxOfficeList);
				$tag.html( "" );
				$.each(data.movieListResult.movieList, function() {
					$tag.append( "<div>코드:" +this["movieCd"]+ "</div>" );
					$tag.append( "<div>영화명:" +this["movieNm"]+ "</div>" );
					$tag.append( "<div>장르:" +this["genreAlt"]+ "</div>" );
				});
				*/
			},//success
			error: function(xhr){
				alert('Error ' + xhr.messages);
			}
		}); //$.ajax
	});
	
	$("#btnSearch2").click(function() {
	//alert('호출시작');
	//MTI3LTE0MTQ5MjI1ODcyODgtNjc0YmI4OTktNTJmZS00M2Y4LThiYjgtOTk1MmZlNzNmOGE3
	//NC0xNDEzMTczNTgxNTgzLTEzZWZmMThhLTMxYTQtNGMwMC1hZmYxLThhMzFhNGFjMDA5Yg==
	//processData: false,
		if($("#selGet2").val()=='')
		{
			alert('기본그룹을 선택하세요!!');
			return false;
		}
		if($("#txtKey2").val()=='')
		{
			alert('발급 받은 키를 입력하여주세요!!');
			return false;
		}
		$("#header2").html("상태:처리중입니다...");
		var key = $("#txtKey").val();
		var targetDt = $("#targetYear").val() + left_pad($("#targetMonth").val()) + left_pad($("#targetDate").val());
		var multiMovieYn = "N";
		var url = $("#txtUrl").val();// + "key=" + key + "&targetDt=" + ymd;
		// xhrObj.setRequestHeader("x-waple-authorization",key);
		$.ajax({
			beforeSend: function(xhrObj){
				xhrObj.setRequestHeader("Content-Type","application/json");
				xhrObj.setRequestHeader("Accept","application/json");
			},
			type: "GET",
			url: url,
			data: {key:key, targetDt:targetDt, multiMovieYn:multiMovieYn},
			dataType: "json",
			success: function(data){
				alert(data.val());
				
			} //success
		}); //$.ajax
	});
	
	
	$("#movie_search_btn").click(function(){
		var action = $("#movie_search_form").attr("action");
		var form_data = {
			"movieNm": $("#movieNm").val()
		};
		
		$.ajax({
			
			// 한 번에 10개씩 밖에 안나옴! 
			// api request 옵션 손볼 것. display, start, .. default option 임.
			dataType: "text",
			type: "POST",
			async: false,
			url: action,
			data: form_data,
			success: function(result){
				alert(result);
//				var xml = $(result);
//				var items = xml.find("movieListResult");
//				alert(items);
//				alert(result);
			},
			error: function(xhr){
				alert(xhr.responseText);
//				alert('Error');
			},
			timeout : 3000
		});
		
	});
	
}); //function //ready
//searchDailyBoxOfficeList
</script>
</head>
<body>
	<header>
	
		<h3>영화검색(kobis)</h3>
		<table>
			<tr>
				<td>1.Base Url : <input type="text" id="txtUrl" name="txtUrl" value="http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.xml?"
					style="width:700px;" /></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">2.Key : <input type="text" id="txtKey" name="txtKey" value="29321a1defe83f76ada504206f1aa602" style="width:450px;" /></tr>
			<tr>
				<td colspan="3">3.Page No: <input type="text" id="txtcurPage" name="txtcurPage" value="1" style="width:150px;"/></td>
			</tr>
			<tr>
			<td colspan="3">
				3.영화명: <input type="text" id="txtmovieNm" name="txtmovieNm" value="" style="width:250px;"/> 
				<input type="button" id="btnSearch" name="btnSearch" value="조회" /></td>
			</tr>
		</table>
		
		<div id="header">
		</div>
	</header>
	
	<br><br>
	
	<header>
		<h3>박스오피스</h3>
		<table>
			<tr>
				<td>1.Base Url : <input type="text" id="txtUrl2" name="txtUrl2" value="http://www.kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchDailyBoxOfficeList.xml?"
					style="width:700px;" /></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">2.Key : <input type="text" id="txtKey2" name="txtKey2" value="29321a1defe83f76ada504206f1aa602" style="width:450px;" /></td>
			</tr>

			<tr>
			<td colspan="3">
				3.날짜: 
				
				<select id="targetYear" name="targetYear">
					<?php 
						for($i=0; $i<60; $i++){
							printf("<option value='%d'>%d</option>", date('Y')-$i, date('Y')-$i);
						}
					?>
				</select>
				<select id="targetMonth" name="targetMonth">
					<?php 
					//
						for($i=0; $i<12; $i++){
							printf("<option value='%d'>%d</option>", $i+1, $i+1);
						}
					?>
				</select>
				<select id="targetDate" name="targetDate">
					<?php 
						for($i=0; $i<30; $i++){
							printf("<option value='%d'>%d</option>", $i+1, $i+1);
						}
					?>
				</select>
				<input type="button" id="btnSearch2" name="btnSearch2" value="조회" /></td>
			</tr>
		</table>
		
		<div id="header2">
		</div>
	</header>
		
		<h3>영화검색(kobis proxy)</h3>	
		<form action="/movie_proxy_kobis.php" method="POST" id="movie_search_form">
			<input type="text" name="movieNm" id="movieNm">
			<input type="button" id="movie_search_btn" value="검색">
		</form>
		
		
		
		<div id="header">
		</div>
	</header>
	
	<div id="result2">
	</div>

</body>
</html>






