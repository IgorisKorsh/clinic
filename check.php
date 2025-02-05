<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    $mail = filter_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
    
    if(mb_strlen($name)<=2 && ($name != "Ян" || $name != "Як")){
        echo "Неподходящее имя.";
        exit();
    }

    $mysql = new mysqli('localhost','root','root','register-bd');
    $mysql->query("INSERT INTO `users` (`login`, `password`, `name`, `phone`, `mail`) VALUES('$login','$pass','$name','$phone','$mail')");
    
    
    setcookie('pat_login', $login, time() + 3600, "/");
    setcookie('pat_pass', $pass, time() + 3600, "/");

    $mysql->close();

    header('Location: /otherhtmls/index.html');
?>
