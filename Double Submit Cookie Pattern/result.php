<?php
if(isset($_POST['username'],$_POST['password'])){
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	if($uname == 'hasala' && $pwd == '12345'){
		echo '<h1>Successfully logged in</h1>';
		session_start();
		$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
		$session_id = session_id();
		setcookie('sessionCookie',$session_id,time()+ 60*60*24*365 ,'/',"",false,false);
		setcookie('csrfTokenCookie',$_SESSION['token'],time()+ 60*60*24*365 ,'/',false,false);
		
	}else{
		echo '<h1>Invalid Credentials</h1>';
		exit();
	}
}
?>

<!DOCTYPE html>
<html>
<head>

		<title>Cross Site Request Forgery Protection</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
	
	$(document).ready(function(){
	
	var cookie_value = "";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
	var csrf = decodedCookie.split(';')[2]
	// alert(decodedCookie)
	if(csrf.split('=')[0] = "csrfTokenCookie" ){
		// alert(csrf.split('csrfTokenCookie=')[1])
		cookie_value = csrf.split('csrfTokenCookie=')[1];
		document.getElementById("tokenIn_hidden_field").setAttribute('value', cookie_value) ;
	}
	});

</script>

</head>
<style>
/* Basics */
html, body {
   margin: 0px;
    padding: 0px;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    color: #444;
    -webkit-font-smoothing: antialiased;
    background: #4d4dff;
}
#container {
    position: fixed;
    width: 340px;
    height: 280px;
    top: 50%;
    left: 50%;
    margin-top: -140px;
    margin-left: -170px;
	background: #a6a6a6;
    border-radius: 3px;
    border: 1px solid #ccc;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
	
}
form {
    margin: 0 auto;
    margin-top: 20px;
}
label {
    color: black;
    display: inline-block;
    margin-left: 18px;
    padding-top: 10px;
    font-size: 15px;
}
input {
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
}
input[type=text],
input[type=password] {
    color: #777;
    padding-left: 10px;
    margin: 10px;
    margin-top: 12px;
    margin-left: 18px;
    width: 290px;
    height: 35px;
	border: 1px solid #c7d0d2;
    border-radius: 2px;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;
	-webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    transition: all .4s ease;
}
input[type=submit] {
    float: right;
    margin-right: 20px;
    margin-top: 10px;
    width: 100px;
    height: 40px;
	font-size: 14px;
    font-weight: bold;
    color: blue;
	border-radius: 40px;
    border: 1px solid red;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
    cursor: pointer;
}

</style>
<body>
	<body>
		
                      <form class="form" action="home.php" method="post">
					  
			
					              
					      
                                <label for="username"><h4>Say Something New<h4></label><br>
                                <input type="text" name="updatepost">
					            <input type="hidden" name="token" value="" />
					      <input type="hidden" name="token" value="" id="token_to_be_added"/>
                                <input type="submit" value="Update Idea">
                      </form>
	</body> 
</body> 
</html>
