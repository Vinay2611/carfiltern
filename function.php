<?php
require_once 'assets/phpmailer/PHPMailerAutoload.php';
/*
 * Function to generate password and pin
 */
function random_password($length) 
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
function encrypt_password($password) 
{
    $hash_cost_factor = 10;
    $e_pwd = password_hash($password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor) );
    return $e_pwd;
}

function verify_password($current,$system)
{
    return password_verify($current, $system);
}


/*
 * Function to generate pin
 */
function random_pin($length) 
{
    $chars = "0123456789";
    $pin = substr( str_shuffle( $chars ), 0, $length );
    return $pin;
}
/*
 * get Ip Address
 */
function get_userip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP'];} 
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; } 
    else { $ip = $_SERVER['REMOTE_ADDR']; }
    return $ip;
}
/*
 *  Mail Sending Code	
 */
function send_mail( $to , $from , $subject, $body )
{
    if(empty($from))
    {
            $from = "dsvinfosolutions@gmail.com";
    }
    $header = "From: ".$from."\r\n";
    $header .= 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    //send mail
    if(mail( $to, $subject, $body, $header))
    {
            return 1;
    }
    else
    {
            return 0;
    }
	
}

function send_phpmail( $toname, $to ,$fromname, $from , $subject, $body )
{
    
    if(empty($from))
    {
        $fromname = 'DSV Infosolutions';
        $from = "dsvinfosolutions@gmail.com";
    }
    if(empty($to))
    {
        $toname = 'DSV Infosolutions';
        $to = "Hugo.bm.olsson@gmail.com";
        
    }
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "dsvinfosolutions@gmail.com";
    $mail->Password = "latest@123";
    $mail->setFrom($from, $fromname);
    $mail->addReplyTo($from, $fromname);
    $mail->addAddress($to, $toname);
    $mail->AddCC('dsvinfosolutions@gmail.com', 'DSV Infosolutions');
    //$mail->AddCC('Hugo.bm.olsson@gmail.com', 'Car Filter');
    $mail->Subject = $subject;
    $mail->IsHTML(true);
    $mail->Body    = $body;
    if (!$mail->send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
         return $mail->ErrorInfo;
    } else {
        return 1;
    }
}

/*
 * function truncate string
 */
function truncate($string,$length)
{
    $string = strip_tags($string);
    if (strlen($string) > $length) 
    {
        // truncate string
        $stringCut = substr($string, 0, $length);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
    }
    return $string;
}
?>