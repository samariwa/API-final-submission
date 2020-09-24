<?php

namespace App\Http\Controllers;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PhpmailerController extends Controller
{

public function sendEmail (Request $request) {
													// load Composer's autoloader
$email = $request->email;
    $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

    try {
      // Server settings
      $mail->SMTPDebug = 1;                                	// Enable verbose debug output
      $mail->isSMTP();                                     	// Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';												// Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                              	// Enable SMTP authentication
      $mail->Username = 'tuskysapi@gmail.com';             // SMTP username
      $mail->Password = 'Kenya.2030';              // SMTP password
      $mail->SMTPOptions = array(
                                  'ssl' => array(
                                      'verify_peer' => false,
                                      'verify_peer_name' => false,
                                      'allow_self_signed' => true
                                  )
                              );
      //Recipients
      $mail->setFrom('tuskysapi@gmail.com', 'Password Reset');
      $mail->addAddress($email, 'Password Reset');	// Add a recipient, Name is optional


      //Attachments (optional)
      // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

      //Content
      $mail->isHTML(true); 																	// Set email format to HTML
      $mail->Subject = "Reset Password";
      $mail->Body    = "
         Hi User,<br><br>
         In order to reset your password, please click on the link below:<br>
         <a href='http://127.0.0.1:8000/change-password'>Password Reset Link</a>
         <br><br>
         Kind Regards.
      ";

      $mail->send();
      return back()->with('success','Message has been sent!');
    } catch (Exception $e) {
      return back()->with('error',$e);
    }
}
}
