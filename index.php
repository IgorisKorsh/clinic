<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Форма регистрации</title>
    </head>
    <body>

    <div class="container mt-4">
        <?php
            if($_COOKIE['user'] == ''):
        ?>
        <div class="row">
            <div class="col">
                <h1>Форма регистрации</h1>
                <form style="width: 500px;" action="check.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите Логин" required><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите Имя" required><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите Пароль" required><br>
                    <button class="btn btn-success" type="submit">Зарегистрировать</button>
                </form>
            </div>
            <div class="col">
                <h1>Форма авторизации</h1>
                <form style='width: 500px;' action="auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите Логин" required><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите Пароль" required><br>
                    <button class="btn btn-success" type="submit">Авторизовать</button>
                </form>
            </div>
        </div>
        <?php else: 
        ?>
        <p>Привет, <?=$_COOKIE['user']?>. Перейти на сайт:<a href="/otherhtmls/clinick.html">клиника</a>.Чтобы выйти нажмите <a style="color:red;" href="/exit.php">ЗДЕСЬ</a></p>
        <?php endif; 
        ?>

    </div>

    </body>
</html>