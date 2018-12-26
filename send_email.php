<?php 

session_start();

if (isset($_POST)) {
	
	if ($_POST["to_email"] && $_POST["sender"] && $_POST["subject"] && $_POST["message"]) {
		
		// Mail gönderme işlemini gerçekleştir..

		$alert = array(

			"message" 	=> "Mail başarılı bir şekilde gönderilmiştir",
			"type" 		=> "success"
		);

		$_SESSION["alert"] = $alert;

		header("location:index.php");
	}

	else{

		$alert = array(

			"message" 	=> "Lütfen tüm alanları doldurunuz!",
			"type" 		=> "danger"
		);

		$_SESSION["alert"] = $alert;

		header("location:index.php");
	}
}

 ?>