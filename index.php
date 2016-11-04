<?php
include('config.php');
$url = $u->getURL(1);
$exp = explode(":",$url);

if($u->getURL(0) == 'listar') {
	
	$listpois = $poi->listarPois();
	if(count($listpois) > 0) {
		foreach($listpois as $row) {
			echo $row['nome'].' (x='.$row['cor_x'].', y='.$row['cor_y'].')<br>';
		}
	}	
	
} elseif($u->getURL(0) == 'proxi') {
	
	$poi->proxiPoi($exp[0],$exp[1],$exp[2]);	
	
} elseif($u->getURL(0) == 'cadastro') {
	
	$count = substr_count($url, ':');	
	if($count <= 1) {
		echo 'Digite os parametros corretamente, ex: 10:20:10';
	} else {
		$poi->cadastrarPois($exp[0],$exp[1],$exp[2]);
	}
	
}
?>