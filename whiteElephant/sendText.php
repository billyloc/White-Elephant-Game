<?php  

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	sendText();

function sendText() {

	$servername = XXXXXXXXX;
	$username = "XXXXXXX";
	$password = XXXXXXX;
	$dbName = XXXXXXXXXX;

	$con = mysqli_connect($servername,$username,$password,$dbName);

    $sql = "SELECT * FROM participants ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($con,$sql);
    while( $row = $result->fetch_object()) {
    	$name = $row->fname;
    	$number = $row->phone;
    	$carrier = $row->carrier;
    }
    // print_r($result);
    // print_r($name);
    // print_r($number);
    // print_r($carrier);

    if($carrier == 'tmobile') {
    	$address = $number.'@tmomail.net';
    } else {
    	$address = $number.'@vtext.com';
    }

    // print_r($result['fname']);


    //Load Composer's autoloader
    require 'vendor/autoload.php';
    // require 'vendor/PHPMailerAutoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = XXXXXXXXXXXXX;                     //SMTP username
        $mail->Password   = XXXXXXXXX;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('email@email.com', 'NAME');
        $mail->addAddress($address, $name);     //Add a recipient
        // $mail->addAddress(xxxx@emailexample.com, 'Name');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('images/Marvel_Studios_logo.jpg');         //Add attachments
        // $mail->addAttachment('images/Marvel_Studios_logo.jpg','Marvel');         //Add attachments    

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'White Elephant Game';
        $mail->Body    = "You ARE bringing the gag gift";

        $mail->send();
        echo 'Person has been chosen';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
}



?>
