<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=l.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Вход</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🪨</text></svg>">
</head>
<body class="bg">
    <div class="formContainer">
        <form method="post" action="proc/processLogin.php">
            <h2 class="title">Вход</h2>
            <div class="tip">
                Войдите в учётную запись по адресу электронной почты и паролю 
            </div><?php
if(isset($_SESSION['error'])){
echo '<div class="errorMsg">'. $_SESSION['error'] .'</div>';
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo '<div class="congratsMsg">'. $_SESSION['success'] .'</div>';
unset($_SESSION['success']);
}
?>
            <label for="login">Имя пользователя<sup>*<span class="required">Обязательное поле</span></sup></label>
            <input type="text" name="login" id="login" placeholder="Логин" required>
            <label for="password">Пароль<sup>*<span class="required">Обязательное поле</span></sup></label>
            <input type="password" name="password" id="password" placeholder="Пароль" required>
            <input type="submit" value="Войти">
        </form>
        <div class="link">
            Нет учётной записи? <a href="signup.php">Зарегистрируйтесь!</a>
        </div>
    </div>
</body>
</html>