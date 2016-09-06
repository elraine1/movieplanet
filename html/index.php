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

</head>
<body>

	<?php require_once('template/header.php'); ?>
	
	<div id="content_wrap">
		
		<div id="content_1">
<!-- 			
			<form action="naver_movie.php" method="POST">
			영화
			<input type="hidden" name="target" value="movie">
			<input type="text" name="query">
			<input type="submit">
			</form>
-->
			<a href="naver_movie.php"><input type="button" value="영화검색"> </a>
		</div>
		
		<div id="content_1">
			<form action="movie_proxy.php" method="POST">
			뉴스
			<input type="hidden" name="target" value="news">
			<input type="text" name="query">
			<input type="submit">
			</form>
		</div>
	</div>
	
	<?php require_once('template/footer.php'); ?>
	
</body>
</html>
	
