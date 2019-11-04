<?php

require_once 'token.php';

$val = $_POST["token"];

if(isset($_POST['idea'])){
	if(token::checkToken($val,$_COOKIE['csrfTokenCookie'])) {
		echo "<h2>Valid request, Updated status: ".$_POST['idea']."</h2>";
		echo "<h3>CSRF token matched (cookie == hidden field)</h3>";
		echo "<h3> Hidden field value (".$val.") match csrfTokenCookie value (".$_COOKIE['csrfTokenCookie'].")</h3>";	
	}else {
		echo "<h2> Invalid (csrf token does not match) :  ".$_POST['idea']."</h2>";
	}
}
?>
