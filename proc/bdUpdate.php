<?php session_start();

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
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['birthday'])){
$strBd = test_input($_POST['birthday']) ?? null;

$arrUsers=getUsersList();
  foreach($arrUsers as $x => $arrProperties) {
    if ($arrProperties['login'] == $_SESSION['login']) $arrUsers[$x]['birthday date']=$strBd;
  }

  $arrUsers=array("Users" => $arrUsers );
  updateLocalJSON(json_encode($arrUsers));

    }
  }