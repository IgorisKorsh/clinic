<?php


setcookie('user', $user['name'], time() - 3600, "/");

header('location: /otherhtmls/auth.html');

?>