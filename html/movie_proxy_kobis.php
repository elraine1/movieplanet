<?php
//header('Content-type:text/xml');
	require_once('classes/KobisProxy.php');

	$kobisproxy = new KobisProxy();
	echo $kobisproxy -> queryKobis($_POST['movieNm']);
//print_r($data);
