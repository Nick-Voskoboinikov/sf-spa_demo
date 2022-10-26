let logobox=document.querySelectorAll('.box')[0];
let soundsource=logobox.querySelector('source');

function handlePlay(){
    let audioElement=document.getElementsByTagName('audio')[0];
    audioElement.setAttribute('autoplay','autoplay');
    audioElement.play();
    logobox.classList.add('clicked');
    logobox.removeEventListener('click', handlePlay);
}

logobox.addEventListener('click', handlePlay);
