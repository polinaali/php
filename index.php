<?php
//echo '<pre>';
//var_dump($_REQUEST);
$message = false; //
$error = false; // Для ошибок
if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name']; // Для сокращения
    $surname = $_REQUEST['surname'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $age = $_REQUEST['age'];
    $answer = $_REQUEST['answer'];
    $comm = $_REQUEST['comm'];
    $week = $_REQUEST['week'];
    $option = $_REQUEST['option'];

    if (empty($name) || empty($surname)
        || empty($phone)|| empty($email)
        || empty($password) || empty($age)
        || empty($answer) || empty($comm)
    ) {
        $error = 'Заполните все поля';
    } else {
        $row = 'Здравствуйте, ' . $name . ' ' . $surname .
            '. Ваш номер: ' . $phone .
            '. Ваша эл. почта: ' . $email .
            '. Ваш возраст: ' . $age .
            '. Вы родились ' . $answer .
            '. Ваш комментарий: ' . $comm .
            '. Сегодня ' . $week .
            '. Вы были ' . $option . PHP_EOL;
        // PHP_EOL = '\n'
        file_put_contents('./contacts.txt',
            $row, FILE_APPEND);
        $message = 'Спасибо! Мы Вам перезвоним.';
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

<div class="container  ">
    <h3 >Форма обратной связи</h3>
    <form action="index.php">

        <?php if ($message) : ?>
            <p class="alert-success col-md-4"><?= $message ?></p>
        <?php else: ?>
            <form class="form-horizontal" action="index.php" method="post">
                <div class="control-group">
                    <label for="name" class="col-sm-2 control-label">Имя</label>
                    <div class="col-md-4">
                        <input type="text" name="name" minlength="2" maxlength="15" class="form-control" placeholder="Введите имя">
                    </div>
                </div>
                <div class="control-group">
                    <label for="surname" class="col-sm-2 control-label">Фамилия</label>
                    <div class="col-md-4">
                        <input type="text" name="surname" minlength="2" maxlength="15" class="form-control" placeholder="Введите Фамилию">
                    </div>
                </div>
                <div class="control-group">
                    <label for="phone" class="col-sm-2 control-label">Телефон</label>
                    <div class="col-md-4">
                        <input type="number" name="phone"  minlength="5" maxlength="11"class="form-control" placeholder="Введите Ваш телефон">
                    </div>
                </div>
                <div class="control-group">
                    <label for="email" class="col-sm-2 control-label">Эл. почта</label>
                    <div class="col-md-4">
                        <input type="email" name="email" class="form-control" placeholder="Введите эл. почта">
                    </div>
                </div>
                <div class="control-group">
                    <label for="password" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-md-4">
                        <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                    </div>
                </div>
                <div class="control-group">
                    <label for="age" class="col-sm-2 control-label">Возраст</label>
                    <div class="col-md-4">
                        <input type="number" name="age" class="form-control" placeholder="Укажите Ваш возраст">
                    </div>
                </div>


                <p><b>В какое время года вы родились?</b></p>

                <p><input type="radio" name="answer" value="зимой">Зима<Br>
                    <input type="radio" name="answer" value="весной">Весна<Br>
                    <input type="radio" name="answer" value="летом">Лето<Br>
                    <input type="radio" name="answer" value="осенью">Осень</p>


                <p><b>Какой сегодня день недели</b></p>

                <select>
                    <option name="week" value="понедельник">ПН</option>
                    <option name="week" value="вторник">ВТ</option>
                    <option name="week" value="среда">СР</option>
                    <option name="week" value="четверг">ЧТ</option>
                    <option name="week" value="пятница">ПТ</option>
                    <option name="week" value="суббота">СБ</option>
                    <option name="week" value="воскресенье">ВС</option>
                </select>

                <p><b>В каких странах вы бывали?</b></p>
                <p><input type="checkbox" name="option" value="В России">В России<Br>
                    <input type="checkbox" name="option" value="В Америке">В Америке<Br>
                    <input type="checkbox" name="option" value="В Канаде">В Канаде<Br>


                    <label for="comm" class="col-sm-2 control-label">Оставьте комментарий</label>
                    <textarea class="form-control" rows="3" cols="10"  name="comm"></textarea>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-lg-10">
                        <button type="submit" name="submit" class="btn btn-success">Отправить</button>
                    </div>
                </div>

                <p class="alert-danger col-md-4"><?= $error ?></p>
            </form>
        <?php endif; ?>


</div>

</body>
</html>
