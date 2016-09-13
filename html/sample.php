<!doctype html>
<!--[if IE 7 ]> <html class="no-js ie ie7 lte7 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie ie8 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 9 ]> <html class="no-js ie ie9 lte9>" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
<head data-live-domain="api.jquery.com">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>jQuery.ajax() | jQuery API Documentation</title>
<meta name="author" content="jQuery Foundation - jquery.org">
<meta name="description" content="jQuery: The Write Less, Do More, JavaScript Library">
<meta name="viewport" content="width=device-width">
<!--script src="./jquery.min.js"></script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
$(document).ready(function() {
	$("#btnSearch").click(function() {
		alert('호출시작');
		//MTI3LTE0MTQ5MjI1ODcyODgtNjc0YmI4OTktNTJmZS00M2Y4LThiYjgtOTk1MmZlNzNmOGE3
		//NC0xNDEzMTczNTgxNTgzLTEzZWZmMThhLTMxYTQtNGMwMC1hZmYxLThhMzFhNGFjMDA5Yg==
		//processData: false,
		var key = "29321a1defe83f76ada504206f1aa602";
		var sccode = 'S02002005';
		$.ajax({
			beforeSend: function(xhrObj){
				xhrObj.setRequestHeader("Content-Type","application/json");
				xhrObj.setRequestHeader("Accept","application/json");
				xhrObj.setRequestHeader("x-waple-authorization",key);
			},
			type: "POST",
			url: "http://14.49.41.130:8880/kriss/json/ocebPropBasic.do",
			data: {sc_code:sccode},
			dataType: "json",
			success: function(data){
				alert('호출성공');
				$tag = $("#result");
				$("#header").html("sc code :" +sccode+ "총건수:" + data.result.length);
				$.each(data.result, function() {
					$tag.append( "<div>casNo:" +this["casNo"]+ "</div>" );
					$tag.append( "<div>sdiCode:" +this["sdiCode"]+ "</div>" );
					$tag.append( "<div>componet1 :" +this["componet1"]+ "</div>" );
				});
				//foreach(item in data.result) { break; }
				alert('ok');
			} //success
		}); //$.ajax
	});
}); //function //ready
</script>
</head>

<body>
	<header>
		<table>
			<tr><td><input type="button" id="btnSearch" name="btnSearch" value="조회" /></td></tr>
		</table>
		<div id="header"></div>
	</header>
	
	<div id="result"></div>
	
</body>

</html>






