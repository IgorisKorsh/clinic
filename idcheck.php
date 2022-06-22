<?php
    $login = filter_var(trim($_GET['login']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_GET['pass']),FILTER_SANITIZE_STRING);
    $mysql = new mysqli('localhost','root','root','register-bd');
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }
    echo "Ваш ID: ";
    echo $user['id'];
    echo "<br>Пожалуйста запомните его<br>";

    $mysql->close();
    echo "<a role='button' href='/otherhtmls/index.html'>Назад</a>"
?>