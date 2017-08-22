<?php

//echo '<pre>';
//var_dump($_REQUEST);

if (isset($_REQUEST['name'])
        and isset($_REQUEST['phone'])){
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];

    $row = 'здравствуйте,' . $name .
        '. ваш номер: ' . $phone . PHP_EOL;

    file_put_contents('./contacts.txt',
        $row,
            FILE_APPEND);
    echo 'спасибо';

    header()

}else {
    echo 'не указаны параметры';
}
