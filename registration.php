<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <form name="regstration" method="post" action="reg.php">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" name="login" id="login" class="form-control mb-2" placeholder="Имя пользователя">
            </div>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input name='email' id="email" required type="email" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Password</label>
                <input required type="password" class="form-control mb-2" name="pass" id="pass" placeholder="Пароль">
            </div>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Password</label>
                <input required type="password" class="form-control mb-2" name="passtwice" id="passtwice" placeholder="Пароль повторно">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Зарегистрироваться</button>
                <a type="button" href="autorisation.php" class="btn btn-primary mb-2">Войти</a>
            </div>
        </div>
    </form>
    <a type="button" href="createDB.php" class="btn btn-primary mb-2">СОЗДАТЬ БАЗУ С ТАБЛИЦАМИ</a>
</div>
<script src="script.js"></script>
</body>
</html>
