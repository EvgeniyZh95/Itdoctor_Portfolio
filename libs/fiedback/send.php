<?
if(
    (isset($_POST['name'])&&$_POST['name']!="")
    &&
    (isset($_POST['mail'])&&$_POST['mail']!="")
    &&
    (isset($_POST['subject'])&&$_POST['subject']!="")
    &&
    (isset($_POST['message'])&&$_POST['message']!="")
    &&
    $_POST['capcha']==56
) { //Проверка отправилось ли наши поля name и не пустые ли они
        $to = 'itdoctor@itdoctor.xyz'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = $_POST['subject']; //Загаловок сообщения
        $message = '
                <!DOCTYPE html>
                <html lang="ru">
                    <head>
                        <meta charset="UTF-8">
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name'].'</p>
                        <p>Почта: '.$_POST['mail'].'</p>
                        <p>Сообщение: '.$_POST['message'].'</p> 
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: " .$_POST['mail']."\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
?>