<?php
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    $prof = filter_var(trim($_POST['prof']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','register-bd');

    $result = $mysql->query("SELECT * FROM `doctors` WHERE `password` = '$pass' AND `prof` = '$prof'");
    $doctor = $result->fetch_assoc();
    if(count($doctor) == 0){
        echo "Такой пользователь не найден";
        exit();
    }

    setcookie('doctor', $doctor['doctor'], time() + 3600, "/");
    setcookie('doc_id', $doctor['doc_id'], time() + 3600, "/");

    $mysql->close();

    header('Location: /otherhtmls/clinick.php');
?>