<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
	
	#header{
		width: 100%;
		height: 260px;
		border: 2px solid black;
		background-color: black;
	}
	
	#login_box{
		width: 100%;
		height: 50px;
		float: center;
		border: 1px solid gray;
		background-color: gray;
		text-align: right;
	}
	
	#login{
		padding-right:30%;
	}
	
	
	#logo{
		width: 75%;
		height: 150px;
		margin: 0 auto;
		float: center;
		border: 3px solid red;
		background-color: red;
		text-align: center;
	}
	
	
	#menu_box{
		width: 75%;
		height: 50px;
		float: center;
		margin: 0 auto;
		border: 2px solid darkgray;
		background-color: darkgray;
	}
	
	li{
		display:inline;  
		text-decoration: none;
		padding-right: 50px;
		font-size: 25px;
	}
	
	a{ 
		text-decoration: none;
	}
	
	
	#content_wrap{
		width: 75%;
		height: 800px;
		margin: 0 auto;
		border: 2px dashed blue;
		background-color: lightblue;
	}
	
	#footer{
		width: 100%;
		height: 150px;
		border: 2px dotted salmon;
		background-color: salmon;
		text-align: center;
	}
	
</style>

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>

<script>
	// JAVASCRIPT 영역 
</script>

</head>
<body>
	<?php 
		require_once('template/header.php');
	?>
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
	
	<div id="footer">
		<h1>FOOTER</h1>
	</div>

</body>
</html>
	
