<?php session_start();

function timeToBday(){
      // Declare and define two dates
      $arrBirthday=explode('-', $_SESSION['bd']);
  $date1 = strtotime("now");
  $date2 = strtotime(date('Y').'-'.$arrBirthday[1].'-'.$arrBirthday[2].' 00:00:01');
  
 
  // Formulate the Difference between two dates
  $diff = ($date2 - $date1);
 
  if($diff > 86400){
 
 
  // To get the year divide the resultant date into
  // total seconds in a year (365*60*60*24)
  $years = floor($diff / (365*60*60*24));

  // To get the month, subtract it with years and
  // divide the resultant date into
  // total seconds in a month (30*60*60*24)
  $months = floor(($diff - $years * 365*60*60*24)
                                 / (30*60*60*24));
 
  // To get the day, subtract it with years and
  // months and divide the resultant date into
  // total seconds in a days (60*60*24)
  $days = floor(($diff - $years * 365*60*60*24 -
               $months*30*60*60*24)/ (60*60*24));
 
  // To get the hour, subtract it with years,
  // months & seconds and divide the resultant
  // date into total seconds in a hours (60*60)
  $hours = floor(($diff - $years * 365*60*60*24
         - $months*30*60*60*24 - $days*60*60*24)
                                     / (60*60));
 
  // To get the minutes, subtract it with years,
  // months, seconds and hours and divide the
  // resultant date into total seconds i.e. 60
  $minutes = floor(($diff - $years * 365*60*60*24
           - $months*30*60*60*24 - $days*60*60*24
                            - $hours*60*60)/ 60);
 
  // To get the minutes, subtract it with years,
  // months, seconds, hours and minutes
  $seconds = floor(($diff - $years * 365*60*60*24
           - $months*30*60*60*24 - $days*60*60*24
                  - $hours*60*60 - $minutes*60));
 
  // Print the result
  printf("Осталось %d месяцев, %d дней, %d часов, "
       . "%d минут, %d секунд до Вашего дня рождения и специальной акции по ее случаю.", $months,
               $days, $hours, $minutes, $seconds);
  } else if( ($diff > -86400) && ($diff < 0) ) {
    echo '<span style="text-transform: uppercase;" >С днём рождения, '.$_SESSION['login'].'!</span> В этот прекрасный день дарим Вам дополнительную скидку в 5% на весь ассортимент.';
    echo '<script>
    let newprices=document.querySelectorAll(\'span.price\');
    for (spanElem of newprices) {
        spanElem.textContent=Math.ceil(spanElem.textContent * 0.95);
      }</script>';
  }
}

if(empty($_SESSION['bd'])){
    echo '<a href="#" class="superoffer" title="Эксклюзивное предложение только для Вас!" >&raquo; Эксклюзивное предложение</a><br><br><br>';
} else {
    echo '<p align="justify" >';
    timeToBday();
    echo '</p><br><br><br>';

}