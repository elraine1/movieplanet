<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<header>
<script>
var elems = [10, 20, 30];

// closure에서 조심해야 할 것
function wrapElements(elems) {
    var result = [];
    for (var i = 0; i < 2; i++) {
        result[i] = function() { 
			return elems[i];
		};
    }
    return result;
}
var wrapped = wrapElements(elems);
document.write('클로저를 무심코 사용한 결과: ' + wrapped[0]() + '<br>');

function wrapElements2(elems) {
    var result = [];
    for (var i = 0; i < elems.length; i++) {
        result[i] = function() { 
			var j = i;
			return function() { return elems[j]; };
		} ();
    }
    return result;
}
var wrapped2 = wrapElements2(elems);
document.write('익명 함수를 삽입한 결과: ' + wrapped2[0]()  + '<br>');

function wrapElements3(elems) {
    var result = [];
    for (var i = 0; i < elems.length; i++) {
        result[i] = new function(value) { [[]]
			this.value = value; 
			this.get = function() { return this.value; } 
		} (elems[i]);
    }
    return result;
}
var wrapped3 = wrapElements3(elems);
document.write('익명 클래스를 삽입한 결과: ' + wrapped3[0].get() + '<br>');
</script>


<?php 

	

	function is_suffix($a, $b){
		if($a === $b){
			return true;
		}
		
		if(strpos($a, $b, strlen($a)-strlen($b))){
			return true;
		}else{
			return false;
		}
	}
	
	$a = 'food';
	$b = 'ood';
	
	var_dump(is_suffix($a, $b)) ;


	
	$person_info = array('name' => 'Calvin', 'age' => 34, 'sex' => 'male');
	
	$result = ksort($person_info);
	echo $result . '<br>';
	echo implode(', ', $person_info) . '<br>';
	
	$result = asort($person_info);
	echo $result . '<br>';
	echo implode(', ', $person_info) . '<br>';
	

?>




</header>
<body>
</body>
</html>