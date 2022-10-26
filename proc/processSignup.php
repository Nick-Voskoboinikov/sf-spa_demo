<?php
session_start();

include_once('module_MacGuffin_functions.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function updateLocalJSON($strData){
    $strDb='../extras/db.json';
    $strFileHandle = fopen($strDb, 'w') or die('Файл недоступен!');
    fwrite($strFileHandle, $strData);
    fclose($strFileHandle);
}

  function signup ($strUsername, $strPassword, $strBirthday=''){
    if (existsUser($strUsername)){
        $strResult='Пользователь с таким логином уже существует, придумайте другое имя.';
    } else {
        $arrUsers=getUsersList();
        $arrNewUser=array("login"=>$strUsername,"password hash"=>sha1($strPassword),"birthday date"=>$strBirthday,"role"=>"user");
        array_push($arrUsers,$arrNewUser);
        $arrUsers=array("Users" => $arrUsers ); // for the sake of beauty & standartization
        updateLocalJSON(json_encode($arrUsers));
        $strResult='success';
    }
    return $strResult;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
$strUsername = test_input($_POST['login']) ?? null;
$strPassword = test_input($_POST['password']) ?? null;
$strBirthday = test_input($_POST['birthday']) ?? null;
  }

  if($strUsername && $strPassword ){
    $strResult=signup ($strUsername, $strPassword, $strBirthday='');
  } else {
    $strResult='Поле имени и/или пароля не заполнено';
  }

if($strResult == 'success'){
    $_SESSION['success'] = 'Учётная запись успешно создана, пожалуйста, авторизуйтесь!';
    header("location: ../login.php");
}else{
    $_SESSION['error'] = $strResult;
    echo $strResult;
    header("location: ../signup.php");
}
