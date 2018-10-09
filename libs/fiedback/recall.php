<?
if(
    (isset($_POST['name2'])&&$_POST['name2']!="")
    &&
    (isset($_POST['mail2'])&&$_POST['mail2']!="")
    &&
    (isset($_POST['service'])&&$_POST['service']!="")
    &&
    (isset($_POST['number'])&&$_POST['number']!="")
    &&
    (isset($_POST['message2'])&&$_POST['message2']!="")
    &&
    $_POST['capcha2']==18
) { //Проверка отправилось ли наши поля name и не пустые ли они
        $to = 'itdoctor@itdoctor.xyz'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Заказ услуги - '.$_POST['service']; //Загаловок сообщения
        $message = '
                <!DOCTYPE html>
                <html lang="ru">
                    <head>
                        <meta charset="UTF-8">
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name2'].'</p>
                        <p>Почта: '.$_POST['mail2'].'</p>
                        <p>Услуга: '.$_POST['service'].'</p>
                        <p>Номер телефона: '.$_POST['number'].'</p>
                        <p>Сообщение: '.$_POST['message2'].'</p> 
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: " .$_POST['mail2']."\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
?>