<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$project_name = trim($_POST["project_name"]);
	$admin_email  = 'vskupka@bk.ru';
	$form_subject = trim($_POST["form_subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} else if ( $method === 'GET' ) {

	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <no-replay@xn--80ahzfdabivc1i.xn--p1ai>' . PHP_EOL .
'Reply-To: no-replay@xn--80ahzfdabivc1i.xn--p1ai' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );

$_POST['Телефон'] = trim($_POST['Телефон']); 
  $_POST['pass'] =  "IP: ".$_SERVER['REMOTE_ADDR']; 
  $_POST['pass_again'] = "IP: ".$_SERVER['REMOTE_ADDR']; 
  // Проверяем не пустой ли суперглобальный массив $_POST 
  if(empty($_POST['Телефон'])) exit(); 
  // Проверяем правильно ли заполнены обязательные поля 
  if(empty($_POST['Телефон'])) exit('Поле "Имя" не заполнено'); 
  if(empty($_POST['pass'])) exit('Одно из полей "Пароль" не заполнено'); 
  if(empty($_POST['pass_again'])) exit('Одно из полей "Пароль" не заполнено'); 
  if($_POST['pass'] != $_POST['pass_again']) exit('Пароли не совпадают'); 
  // Если введён e-mail проверяем его на соответсвие 
 

  ///////////////////////////////////////////////// 
  // 2. Блок проверки имени на уникальность 
  ///////////////////////////////////////////////// 
  // Имя файла данных 
  $filename = "text.txt";  
  // Проверяем не было ли переданное имя 
  // зарегистрировано ранее 
  $arr = file($filename); 
  foreach($arr as $line) 
  { 
   
    // В массив $temp помещаем имена уже зарегистрированных 
    // посетителей 
    $temp[] = $data[0]; 
  } 
  // Проверяем не содержится ли текущее имя 
  // в массиве имён $temp 
  if(in_array($_POST['Телефон'], $temp)) 
  { 
    exit("Данное имя уже зарегистрировано, пожалуйста, выберите другое"); 
  } 
//open file to write
$fp = fopen("text.txt", "r+");
// clear content to 0 bits
ftruncate($fp, 0);
//close file
fclose($fp);
  ///////////////////////////////////////////////// 
  // 3. Блок регистрации пользователя 
  ///////////////////////////////////////////////// 
  // Помещаем данные в текстовый файл 
  $fd = fopen($filename, "a"); 
  if(!$fd) exit("Ошибка при открытии файла данных"); 
  $str = $_POST['Телефон']."". 
         
         $_POST['url']."\r\n"; 
  fwrite($fd,$str); 
  fclose($fd); 

  
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