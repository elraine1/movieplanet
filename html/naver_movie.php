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
		height: 125px;
		margin: 0 auto;
		float: center;
		border: 3px solid red;
		background-color: red;
		text-align: center;
	}
	
	
	#menu_box{
		width: 75%;
		height: 75px;
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


	<div id="header">	
		<div id="login_box">
			<span id="login">로그인 박스</span>
		</div>
		<div id="logo">
			<h1>로오오오오오고오오오오오</h1>
		</div>
		<div id="menu_box">
			<ul id="menu">
				<li><a href="#"> 메뉴 1 </a></li>
				<li><a href="#"> 메뉴 2 </a></li>
				<li><a href="#"> 메뉴 3 </a></li>
			</ul>
		</div>
	</div>
	
	<div id="content_wrap">
		        <div class="search_book">
        <fieldset class="srch">
                <legend>검색영역</legend>
                <input type="text" name="query" id="query" accesskey="s" title="검색어" class="keyword" value="">
                <input type="button" id="search" name="search" alt="검색" value="검색" />
        </fieldset>
        
        <table cellspacing="0" border="1" summary="책검색 API 결과" class="tbl_type">
        <caption>영화 검색 API 결과</caption>
                <colgroup>
                        <col width="10%">
                        <col width="20%">
                        <col width="15%">
                        <col width="15%">
                        <col width="15%">
                        <col width="10%">
                        <col width="15%">
                </colgroup>
                <thead>
                        <tr>
                        <th scope="col">포스터</th>
                        <th scope="col">영화제목</th>
                        <th scope="col">감독</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                </thead>
                <tbody id="list">
                        <tr class="__oldlist" style="">
                                <td colspan="7">검색 결과가 없습니다.</td>
                        </tr>
                        <tr class="__template" style="display: none">
                                <td><img src="##"  width="50px" height="70px" /></td>
                                <td>##</td>
                                <td>##</td>
                                <td>##</td>
                                <td>##</td>
                                <td>##</td>
                                <td>##</td>
                        </tr>
                </tbody>
        </table>
        </div>
		
	</div>
	
	<div id="footer">
		<h1>FOOTER</h1>
	</div>

</body>
</html>
	
