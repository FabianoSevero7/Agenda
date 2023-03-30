<?php 
session_start();

if ($_SESSION['login']!=="OK"){
	$msg=urlencode("Voce não está logado!");
	header('location: login.html?retorno='.$msg);
}
if(isset($_SESSION['tempo'])) {
	$decorrido=time()-$_SESSION['tempo'];
	if($decorrido>$_SESSION['vida']){
		session_destroy();
		$msg=urlencode("Sua sessao expirou!");
		header('location:login.php?retorno='.$msg);
	} else {
		$_SESSION['tempo']=time();
//		session_regenerate_id(true);
	}
}
?>
