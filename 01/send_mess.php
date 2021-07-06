<?php
    // фильтр от ненужных запросов в форму
    // trim удаляет лишние пробелы в начале и конце строки
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

    $error = '';
    if (strlen($username) <= 3) {
        $error = 'Введите имя';
    } else if (strlen($email) <= 3) {
        $error = 'Введите E-mail';
    } else if (strlen($mess) <= 3) {
        $error = 'Введите сообщение';
    }

    if ($error != '') {
        echo $error;
        exit();
    }

    $to = 'mail@mail.ru';
    $subject = "=?utf-8?B?".base64_encode('Письмо с сайта [Блог PHP]')."?=";
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";
    mail($to, $subject, $mess, $headers);

    echo 'Готово';
?>