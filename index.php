
<?php

$message =false;

if (isset($_REQUEST['name'])//isset - показывает, определена ли переменная в скобках
    and isset($_REQUEST['phone'])) {
    $name = $_REQUEST['name']; //условие, показываеющее, что надо присвоить имя и тлф переменной
    $phone = $_REQUEST['phone'];

    $row = 'здравствуйте,' . $name .
        '. ваш номер: ' . $phone . PHP_EOL;// показывает, что надо писать в браузере;
    //PHP_EOL -  перенос на новую строку


    file_put_contents('./contacts.txt', //пишет строку в указанный фаил
        $row,
        FILE_APPEND); //данные будут дописаны в конец файла вместо того, чтобы его перезаписать
    $message = 'спасибо';
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php if ( $message) : ?>
    <?= $message ?>
<?php else: ?>
    <form action="index.php" method="post"> <!-- form - чтобы в php можно было использовать html
     action - содержит адрес того, что нужно сделать;
     method - сообщает серверу о методе запроса
     ="post" - передача данных скрытым способом -->
        <p>представьтесь</p> <!--то что видно в браузере-->
        <input type="text" name="name"><!-- отправляет данные на сервер -->
        <p>укажите ваш номер</p>
        <input type="text" name="phone">
        <button type="submit">отправить</button><!-- тип кнопки -->
    </form>

<?php endif; ?><!-- завершение цикла-->
</body>
</html>
