<?php
    // фильтр от ненужных запросов в форму
    // trim удаляет лишние пробелы в начале и конце строки
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';
    if (strlen($username) <= 3) {
        $error = 'Введите имя';
    } else if (strlen($email) <= 3) {
        $error = 'Введите E-mail';
    } else if (strlen($login) <= 3) {
        $error = 'Введите логин';
    } else if (strlen($pass) <= 3) {
        $error = 'Введите пароль';
    }

    if ($error != '') {
        echo $error;
        exit();
    }

    // добавляем шифровочную часть к паролю
    $hash = "giskljgf5455llllee5easd89fasdf";
    $pass = md5($pass . $hash);

    // подключаемся к базе данных
    require_once 'bd.php';

    $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $pass]);

    echo 'Готово';
?>