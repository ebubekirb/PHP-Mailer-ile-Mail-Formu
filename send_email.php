<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";


if (isset($_POST)) {
	
	if ($_POST["to_email"] && $_POST["sender"] && $_POST["subject"] && $_POST["message"]) {
		
		// Mail gönderme işlemini gerçekleştir..

		$mail = new PHPMailer(true);

		try {

			//Server Ayarları
			$mail->SMTPDebug 	= 2;
			$mail->isSMTP();
			$mail->Host 		= "ssl://smtp.gmail.com";
			$mail->SMTPAuth 	= true;
			$mail->Username 	= "ebubekr385@gmail.com";
			$mail->Password 	= "549385_:";
			$mail->CharSet 		= "utf8";
			$mail->SMTPSecure 	= "tls";
			$mail->Port = 465;

			//Alıcı Ayarları
			$mail->setFrom("ebubekr385@gmail.com", $_POST["sender"]);
			$mail->addAddress($_POST["to_email"], "");
			// $mail->addBCC("", "");
			// $mail->addBCC("", "");


			//Gönderi Ayarları
			$mail->isHTML();
			$mail->Subject 	= $_POST["subject"];
			$mail->Body 	= $_POST["message"];

			if ($mail->send()) {
				
				$alert = array(
					"message" 	=> "Mail başarılı bir şekilde gönderilmiştir",
					"type" 		=> "success"
				);

			} else{

				$alert = array(
					"message" 	=> "Mail gönderirken bir hata oluştu!",
					"type" 		=> "success"
				);

			}

			
		} catch (Exception $e) {
			
			$alert = array(
				"message" 	=> $e->getMessage(),
				"type" 		=> "danger"
			);
		}

	}

	else{

		$alert = array(

			"message" 	=> "Lütfen tüm alanları doldurunuz!",
			"type" 		=> "danger"
		);

	}

	$_SESSION["alert"] = $alert;

	header("location:index.php");
}

 ?>