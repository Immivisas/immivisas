<?php
// $to = "shahnawazbharuchwala@gmail.com";
// $subject = "My subject";
// $txt = "Hello world!";
// $header = "From: webmaster@example.com" . "\r\n" ;


// $sentmail = mail($to, $subject, $txt, $header);

// echo $sentmail;

 $email = "yijod41724@ofmailer.net";
                                                $fname = "abc";
                                                $subject = "abc";
                                                $message ="abc";
                                                //echo $email;
                                                $to = "nakranimanushree888@gmail.com";
                                                $subject = $subject;
                                                $header = $email . " " . $fname;
                                                $message = "Name:".$fname. "\n". "Gmail:" .$email. "\n". "Subject:" .$subject."\n". "Message:" .$message;
                                                //$message .= "http://www.yourname.com/confirm.php?passkey=$com_code";

                                                $sentmail = mail($to, $subject, $message, $header);

                                                if ($sentmail) {

                                                    // header("location:contact.php");
                                                    // echo'<script>document.location.replace("contact.php")</script>';
                                                    echo "<h5 style='color:green'>Mail Send Successfully......</h5>";
                                                } else {
                                                    echo "<h5 style='color:red'>Mail Not Send Please Try Again......</h5>";
                                                }


if ($sentmail) {

                                                    // header("location:contact.php");
                                                    // echo'<script>document.location.replace("contact.php")</script>';
                                                    echo "<h5 style='color:green'>Mail Send Successfully......</h5>";
                                                } 
                                                else
                                                {
                                                    echo "<h5 style='color:red'>Mail Not Send Please Try Again......</h5>";
                                                }
?>