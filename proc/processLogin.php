<?php session_start();

include_once('module_MacGuffin_functions.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = test_input($_POST['login']) ?? null;
$password = test_input($_POST['password']) ?? null;
  }

if (null !== $username && null !== $password) {

    // Если пароль из базы совпадает с паролем из формы
    if (checkPassword($username, $password)) {
            
        
   	 // Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true; 
        
        // Пишем в сессию логин пользователя
        $_SESSION['login'] = $username; 

    }else{
        $strError = 'Проверьте корректность введенных логина и пароля!';
        }
}

    
$auth = $_SESSION['auth'] ?? null;

// если авторизованы
if ($auth) {
    header("location: ../index.php");
}else{
$_SESSION['error'] = $strError;
    header("location: ../login.php");
}

?>
