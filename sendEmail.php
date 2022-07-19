<?php
             $bodymail = '
            <h1> mssage From '.$_POST['full-name'].'</h1>
            <h1>'.$_POST['email'].'</h1>
            <p>'.$_POST['msg'].'</p>';
            
            $bodymail = $bodymail .'</table>';
            require 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'panel.freehosting.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'manger@binyedik.online';                 // SMTP username
            $mail->Password = "K7IUa4N3kq";                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->AddReplyTo('manger@binyedik.online');
            $mail->From = $_POST['email'];
            $mail->FromName = $_POST['fname'].' '.$_POST['lname'];
            $mail->addAddress('manger@binyedik.online', 'Admin');     // Add a recipient

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'order form the website';
            $mail->Body = $bodymail;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'send';
            }
?>