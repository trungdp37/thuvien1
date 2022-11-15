<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
        include 'library.php'; // include the library file
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {

            //Server settings
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = SMTP_UNAME;                 // SMTP username
            $mail->Password = SMTP_PWORD;                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = SMTP_PORT;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom(SMTP_UNAME, "Tên người gửi");
            $mail->addAddress($email, 'Tên người nhận');     // Add a recipient | name is option
            $mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');
//                    $mail->addCC('CCemail@gmail.com');
//                    $mail->addBCC('BCCemail@gmail.com');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body = $noidung;
            $mail->AltBody = $noidung; //None HTML
            $result = $mail->send();
            if (!$result) {
                echo "<script> alert('Error: ha ') </script>";
            }
        } catch (Exception $e) {
            echo "<script> alert('Message could not be sent. Mailer Error: ', $mail->ErrorInfo) </script>";
        }
    ?>
