<?php
//header('Content-type:text/xml');
	require_once('classes/NaverProxy.php');

	$naverproxy = new NaverProxy();
	echo $naverproxy -> queryNaver($_POST['query'], $_POST['target'], "", "");
//print_r($data);
