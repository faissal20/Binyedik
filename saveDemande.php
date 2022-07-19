<?php 
    session_start();
    require_once 'dbcon.php';
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])){
        if(empty($_POST['fname']) || strlen($_POST['fname']) > 20 ){
            echo 'fnameErr';
        }
        else if(empty($_POST['lname']) || strlen($_POST['lname']) > 20 ){
            echo 'lnameErr';
        }
        else if( empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo 'emailErr';
        }
        else if( empty($_POST['phone']) ||  !is_numeric($_POST['phone']) || strlen($_POST['phone']) > 20 ){
            echo 'phoneErr';
        }
        else if( empty($_POST['address'])){
            echo 'addErr';
        }
        else{
        $stmt = $con->prepare("INSERT INTO orders (user_f, user_l, email , address, phone, produt_id , qnt ) VALUES (?, ?, ?, ? , ? , ? , ?)");
        if($stmt){
        $stmt->bind_param("sssssii", $fname, $lname, $email, $address, $phone, $produit, $qnt);
        // for saving in the data basee
          
        foreach($_SESSION['panier'] as $key => $value)  {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['city'].' '.$_POST['postal'].' '.$_POST['address'] ;
            $produit = $value['id'];
            $qnt = $value['qnt'];
            $stmt->execute();
            }
          	
            // for sending email
            
            $bodymail = '
            <h1> order From '.$_POST['fname'].' '.$_POST['lname'].'</h1>
            <table><tr>';
            foreach($_SESSION['panier'] as $key => $value ){
            $sql = "SELECT c.c_namee FROM categorie as c , produit as p WHERE p.id ='".$value['id']."' AND   c.id = p.categorie";
            $res = $con->query($sql);
            $row = $res->fetch_assoc();
            $bodymail = $bodymail.'<td>'. $row['c_namee'].'</td><td>'. $value['name'].'</td><td>'. $value['qnt'].'</td><td>'. $value['prix'].'</td></tr>';
            }
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
                echo 'true';
            }
            }
        else
        {
        echo mysqli_error($con);
        }  
    }     
    }
?>