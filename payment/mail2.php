<?php
include 'phpmailer/PHPMailerAutoload.php';
include ('phpmailer/class.phpmailer.php');
          $mail = new PHPMailer();
               $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();
                // $mail->Host = "localhost";                                     // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'payment.ivssolutions@gmail.com';                 // SMTP username
                $mail->Password = 'dtrooxnhdtmzzmck';                           // SMTP password
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPConnect(
                    array(
                        "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                            "allow_self_signed" => true
                        )
                    )
                );                           // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;
            $mail->AddAddress("payment.ivssolutions@gmail.com","IVS Solutions");
            $mail->SetFrom('payment.ivssolutions@gmail.com', 'IVS Solutions');
            // $mail->AddReplyTo("hareshjambucha.bca@gmail.com","Haresh");
            $mail->Subject  = "Message from  Contact form";
            $mail->Body     = 'user_message';
            $mail->WordWrap = 50;
            if(!$mail->Send()) {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
            } else {
            echo 'Message has been sent.';
            }
?>