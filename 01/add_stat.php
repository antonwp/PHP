<?php
    // фильтр от ненужных запросов в форму
    // trim удаляет лишние пробелы в начале и конце строки
    $stat_title = trim(filter_var($_POST['stat_title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
    $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

    $error = '';
    if (strlen($stat_title) <= 3) {
        $error = 'Введите название статьи';
    } else if (strlen($intro) <= 15) {
        $error = 'Введите интро (от 15 символов)';
    } else if (strlen($text) <= 20) {
        $error = 'Введите текст (от 20 символов)';
    }

    if ($error != '') {
        echo $error;
        exit();
    }

    // подключаемся к базе данных
    require_once 'bd.php';

    $sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES(?, ?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$stat_title, $intro, $text, time(), $_COOKIE['login']]);

    echo 'Готово';
?>