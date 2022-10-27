let logobox=document.querySelectorAll('.box')[0];
let soundsource=logobox.querySelector('source');

function handlePlay(){
    let audioElement=document.getElementsByTagName('audio')[0];
    audioElement.setAttribute('autoplay','autoplay');
    audioElement.play();
    logobox.classList.add('clicked');
    logobox.removeEventListener('click', handlePlay);
}

function askForBDay(){
let bday= prompt("Когда Вы родились?",((new Date()).getFullYear()-18) +"-"  + ((new Date()).getMonth()) + "-"  + ((new Date()).getDate()));
if (bday != null){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(xhttp.response);
      specialoffer.style.display="none";
    }
  };
xhttp.open("POST", "/proc/bdUpdate.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("birthday="+bday);
}
}

logobox.addEventListener('click', handlePlay);

let specialoffer=document.querySelector('a.superoffer');
if(typeof(specialoffer) != 'undefined' && specialoffer != null){
specialoffer.addEventListener('click', askForBDay);
}
