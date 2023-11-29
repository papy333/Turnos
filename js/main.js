var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
}

var boton = document.getElementById('btn-llamar');

boton.addEventListener('click',function(){
    playAudio();
})
