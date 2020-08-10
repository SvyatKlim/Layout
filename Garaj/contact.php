<?php

$Name = trim($_POST['user_name']);
$Tel= trim($_POST['user_tel']);
$Comment = trim($_POST['comment']);


$absender= 'Test <alisa.umnova@gmail.com>';

$emailTo = 'alisa.umnova@gmail.com';
//$emailTo2 = 'info@jantosca-catering.de';

$subject = 'Lead';
$subject = '=?utf-8?b?' . base64_encode($subject) . '?=';

$header = "From: " . $absender . "\n";

//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$header .= "Content-type: text/plain; charset=ISO-8859-1\r\n";
$header .= "<!-- content-transfer-encoding -->: quoted-printable";

$main_body = "Имя " . $Name . "\n";
$main_body .= "Телефон = " . $Tel . "\n";
$main_body .= "Комментарий = " . $Comment . "\n";


$mail = mail($emailTo, $subject, $main_body, $header, '-f' . $absender);
//$mail2 = mail($emailTo2, $subject, $main_body, $header, '-f' . $absender);

echo 'ok';
