<?php 
	include "config/config.php";
	include ROOT."/include/function.php";
	if (!isset($_SESSION)) session_start();
	  spl_autoload_register("loadClass");
	$db= new Db();
	$name=isset($_POST['name']) ? $_POST['name'] : '';
	$email=isset($_POST['email']) ? $_POST['email'] : '';
	$pass=isset($_POST['password']) ? $_POST['password'] : '';
	$phone=isset($_POST['phone']) ? $_POST['phone'] : '';
	$password=md5($pass);
	
	$sql = "INSERT INTO user (tenuser,sdt,email,password,chucnang,diachi) VALUES ('$name','$phone','$email','$password','client','')";
	echo($sql); 
	if($name== ''|| $phone ==''||$email==''||$password==''){
		echo 'false';
		exit();
	}
	else
		$data = $db->exeNoneQuery($sql);
	if($data){
		echo 'true';
	}
	else{
		echo 'false';
	}
	
?>

<?php
//echo "=============="; exit;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require_once ROOT.'/smtpmail/PHPMailerAutoload.php';///phải thêm _once cho phép nạp 1 lần

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;///ghi chú phải sửa 2->0 cho đừng chạy ra cách gửi

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "trinhnguyen.caocao@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "caocaochauchau";

//Set who the message is to be sent from
$mail->setFrom('trinhnguyen.caocao@gmail.com', 'trinh');

//Set an alternative reply-to address
$mail->addReplyTo('trinhnguyen.caocao@gmail.com', 'trinh');

//Set who the message is to be sent to
$mail->addAddress($email);

//Set the subject line
$chude="WELLCOME YOU! YOU HAVE BECAME OUR MEMBER";
$mail->Subject = $chude;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$noidung ="Dear &nbsp;". $name. "&nbsp; Chào mừng bạn là thành viên của ComputerShop"."<hr> <a href=" .BASE_URL.">Trang web </a>";
$mail->msgHTML($noidung);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>