<?php
session_start();
include('conexao.php');

if(empty($_POST['email'])) {
	header('Location: ../recuperar.php');
	exit();
}else{

	$email = mysqli_real_escape_string($conexao, $_POST['email']);

	$random = randomPassword();

	$sql = "update usuario set senha = md5('{$random}') where email = '{$email}'";

	if($conexao->query($sql) === TRUE){

		$conexao->close();

		require '../PHPMailer-master/src/PHPMailer.php';
		require '../PHPMailer-master/src/SMTP.php';
		require '../PHPMailer-master/src/Exception.php';

	    $mail = new PHPMailer\PHPMailer\PHPMailer();
	    $mail->IsSMTP(); // enable SMTP

	    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	    $mail->SMTPAuth = true; // authentication enabled
	    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	    $mail->Host = "smtp.gmail.com";
	    $mail->Port = 465; // or 587
	    $mail->IsHTML(true);
	    $mail->Username = "mayradbueno";
	    $mail->Password = "<welcometothecircus26>";
	    $mail->SetFrom("mayradbueno@gmail.com");
	    $mail->Subject = "Recuperar senha";
	    $mail->Body = "<b>Código:</b> " . $random ." <b>Use o código para redefinir sua senha:</b> http://localhost/loginphp/redefinirsenha.php";
	    $mail->AddAddress($email);

	     if(!$mail->Send()) {
	        echo "Mailer Error: " . $mail->ErrorInfo;
	     } else {
	        echo "Message has been sent";
	     }

		header('Location: ../enviado.php');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: ../index.php');
		exit();
	}

}


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
