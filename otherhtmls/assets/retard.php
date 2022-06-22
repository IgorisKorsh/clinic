<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
    $datetime = filter_var(trim($_POST['datetime']), FILTER_SANITIZE_STRING);
    $doc_id = filter_var(trim($_POST['doc_id']), FILTER_SANITIZE_STRING);
    
    $mysql = new mysqli('localhost','root','root','register-bd');

    $result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `id` = '$id'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }
    
    $mysql->query("INSERT INTO `zapis` (`id`,`name`, `doc_id`, `datetime`) VALUES('$id','$name','$doc_id','$datetime')");

    $mysql->close();

    header('Location: /otherhtmls/index.html');
?>