<?php 
ini_set('display_errors','Off');
$email = 'vihrovilya96@gmail.com'; // адрес куда отправлять письмо, можно несколько через запятую
$subject = 'Заявка на оценку с сайта продатьмото.рф'; // тема письма с указанием адреса сайта
$message = 'Данные формы:'; // вводная часть письма
$addreply = ''; // адрес куда отвечать (необязательно)
$username = 'no-replay@xn--80ahzfdabivc1i.xn--p1ai'; // имя отправителя (необязательно)
$smtp = 0; // отправлять ли через почтовый ящик, 1 - да, 0 - нет, отправлять через хостинг

// настройки почтового сервера для режима $smtp = 1 (Внимание: с GMAIL не работает)
$host = 'smtp.mail.ru'; // сервер отправки писем (приведен пример для Яндекса)
$username = ''; // логин вашего почтового ящика
$password = ''; // пароль вашего почтового ящика
$auth = 1; // нужна ли авторизация, 1 - нужна, 0 - не нужна
$secure = 'ssl'; // тип защиты
$port = 465; // порт сервера
$charset = 'utf-8'; // кодировка письма

// дополнительные настройки
$cc = ''; // копия письма
$bcc = ''; // скрытая копия

$client_email = ''; // поле откуда брать адрес клиента
$client_message = ''; // текст письма, которое будет отправлено клиенту
$client_file = ''; // вложение, которое будет отправлено клиенту

$export_file = ''; // имя файла для экспорта в CSV
$export_fields = ''; // список полей для экспорта (через запятую)

$fields = "";
foreach($_POST as $key => $value){
  if($value === 'on'){ $value = 'Да'; }
  if($key === 'sendto'){ 
    $email = $value;
  } elseif($key === 'required_fields'){
    $required = explode(',', $value); 
  } else {
    if(in_array($key, $required) && $value === ''){ echo 'ERROR_REQUIRED'; die(); }
    if(is_array($value)){
      $fields .= str_replace('_',' ',$key).': <b>'.implode(', ', $value).'</b> <br />';
    }else{
      if($value !== ''){ $fields .= str_replace('_',' ',$key).': <b>'.$value.'</b> <br />'; }
    }
  }
}

if($export_file !== ''){
  $vars = explode(',', $export_fields);
  $str_arr[] = '"'.date("d.m.y H:i:s").'"';
  foreach($vars as $var_name) {
    if(isset($_POST[$var_name])){ $str_arr[] = '"'.$_POST[$var_name].'"'; }
  }
  file_put_contents($export_file, implode(';', $str_arr)."\n", FILE_APPEND | LOCK_EX);
}

smtpmail($email, $subject, $message.'<br>'.$fields);
if(!empty($client_email)){
  empty($client_message) ? $message .= '<br>'.$fields : $message = $client_message;
  smtpmail($_POST[$client_email], $subject, $message, true);
}

function smtpmail($to, $subject, $content, $client_mode = false){

global $success, $smtp, $host, $auth, $secure, $port, $username, $password, $from, $addreply, $charset, $cc, $bcc, $client_email, $client_message, $client_file;

require_once('class-phpmailer.php');
$mail = new PHPMailer(true);
if($smtp){ $mail->IsSMTP(); }
try {
  $mail->SMTPDebug  = 0;
  $mail->Host       = $host;
  $mail->SMTPAuth   = $auth;
  $mail->SMTPSecure = $secure;
  $mail->Port       = $port;
  $mail->CharSet    = $charset;
  $mail->Username   = $username;
  $mail->Password   = $password;

  if(!empty($username)) $mail->SetFrom($username, $from);
  if(!empty($addreply)) $mail->AddReplyTo($addreply, $from);

  $to_array = explode(',', $to); foreach ($to_array as $to){ $mail->AddAddress($to); }
  if(!empty($cc)){ $to_array = explode(',', $cc); foreach ($to_array as $to){ $mail->AddCC($to); }}
  if(!empty($bcc)){ $to_array = explode(',', $bcc); foreach ($to_array as $to){ $mail->AddBCC($to); }}

  $mail->Subject = htmlspecialchars($subject);
  $mail->MsgHTML($content);


  $uploaddir = 'tmp/'; 
  if ($_FILES['file1']['name']) {
    if (move_uploaded_file($_FILES['file1']['tmp_name'],$uploaddir.$_FILES['file1']['name'])) {
      $mail->AddAttachment($uploaddir.$_FILES['file1']['name'], $_FILES['file1']['name']);
    }
  }

  if ($_FILES['file2']['name']) {
    if (move_uploaded_file($_FILES['file2']['tmp_name'],$uploaddir.$_FILES['file2']['name'])) {
      $mail->AddAttachment($uploaddir.$_FILES['file2']['name'], $_FILES['file2']['name']);
    }
  }

  if ($_FILES['file3']['name']) {
    if (move_uploaded_file($_FILES['file3']['tmp_name'],$uploaddir.$_FILES['file3']['name'])) {
      $mail->AddAttachment($uploaddir.$_FILES['file3']['name'], $_FILES['file3']['name']);
    }
  }

  if ($_FILES['file4']['name']) {
    if (move_uploaded_file($_FILES['file4']['tmp_name'],$uploaddir.$_FILES['file4']['name'])) {
      $mail->AddAttachment($uploaddir.$_FILES['file4']['name'], $_FILES['file4']['name']);
    }
  }

  // if(!empty($client_file) && $client_mode){
  //   $mail->AddAttachment($client_file);
  // }elseif(!$client_mode){
  //   if($_FILES['file']['name'][0] !== '') {
  //     $files_array = reArrayFiles($_FILES['file']);
  //     if( $files_array !== false ){
  //     foreach ($files_array as $file) {
          
  //     }}
  //   }
  // }

  $mail->Send();
  if(!$client_mode) header('Location: thanks.html');
  // if(!$client_mode) echo('success');

} catch (phpmailerException $e) {
  echo $e->errorMessage();
} catch (Exception $e) {
  echo $e->getMessage();
}
}

function reArrayFiles(&$file_post) {
    if($file_post === null){ return false; }
    $files_array = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $files_array[$i][$key] = $file_post[$key][$i];
        }
    }
    return $files_array;
}


    $sms_chek = "1"; // переключатель смс-подтверждения (1-отправлять смс; 0-не отправлять смс)
    $tel = $_POST['Телефон']; // телефон для отправки смс-подтверждения
    $sms_api = '5A850726-76BA-EED1-41BE-A765F9A945A2'; // api-id сервиса trend.sms.ru
    
        // Отправка СМС //
        if ("1" == "1") {
          file_get_contents("http://sms.ru/sms/send?api_id=".$sms_api."&to=".$tel."&text=".urlencode("Продатьмото.рф
Чтобы максимально быстро рассчитать стоимость, отправьте нам
1 Фото с разных ракурсов
2 Название модель, марку
3 Год выпуска
4 Местоположение
5 Желаемую стоимость
На WhatsApp/Viber/Telegram по номеру 89219153606 
Или почту vskupka@bk.ru"));
// Отправка СМС
        
        }
  

?>  
<?php
header('Location: ../thanks.html');

?>

