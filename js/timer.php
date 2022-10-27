<?php session_start();

header('Content-Type: text/javascript');

$strTimeVal=date('M j, o H:i:s', strtotime('+24 hours'));
echo '

function pad(num, size) {
    var s = "0" + num;
    return s.substr(s.length-size);
}
function updateTimer(time) {
    future = Date.parse(time);
 now = new Date();
 diff = future - now;

 if(diff>0){
 hours = Math.floor(diff / (1000 * 60 * 60));
 mins = Math.floor(diff / (1000 * 60));
 secs = Math.floor(diff / 1000);

 h = hours;
 m = mins - hours * 60;
 s = secs - mins * 60;

 document.getElementById("timer")
  .innerHTML =
  \'<span>\' + pad(h,2) + \':\' +  pad(m,2) + \':\' + pad(s,2) + \'</span>\';
 }
}

let firsttime = JSON.parse(localStorage.getItem(\'logontime\'));
if(firsttime == null){
  localStorage.setItem(\'logontime\', JSON.stringify("'.$strTimeVal.'"));
  setInterval(\'updateTimer("'.$strTimeVal.'")\', 1000);
  console.log("'.$strTimeVal.'");
} else {
    setInterval(\'updateTimer(firsttime)\', 1000);
}
    let prices=document.querySelectorAll(\'span.price\');
    
    for (spanElem of prices) {
        spanElem.textContent=Math.ceil(parseInt(spanElem.textContent,10) * 0.97);
      }';
