var form = document.getElementById('id');

    var uno = document.getElementById('uno'),
        dos = document.getElementById('dos'),
        tres = document.getElementById('tres'),
        cuatro = document.getElementById('cuatro'),
        cinco = document.getElementById('cinco'),
        seis = document.getElementById('seis'),
        siete = document.getElementById('siete'),
        ocho = document.getElementById('ocho'),
        nueve = document.getElementById('nueve'),
        cero = document.getElementById('cero'),
        borrar = document.getElementById('borrar');

        function numero(number){
            form.value = form.value + form.textContent + number;  
        }

        uno.addEventListener('click', function(){
            numero(1);   
        });
        dos.addEventListener('click', function(){
            numero(2);   
        });
        tres.addEventListener('click', function(){
            numero(3);   
        });
        cuatro.addEventListener('click', function(){
            numero(4);   
        });
        cinco.addEventListener('click', function(){
            numero(5);   
        });
        seis.addEventListener('click', function(){
            numero(6);   
        });
        siete.addEventListener('click', function(){
            numero(7);   
        });
        ocho.addEventListener('click', function(){
            numero(8);   
        });
        nueve.addEventListener('click', function(){
            numero(9);   
        });
        cero.addEventListener('click', function(){
            numero(0);   
        });
        borrar.addEventListener('click', function(){
            form.value = form.value.substring(0, form.value.length-1);
        });