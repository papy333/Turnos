<div class="atender-clientes">
<audio id="myAudio">
  <source src="assets/css/iphone_whatsapp_sms.ogg" type="audio/ogg">
  <source src="assets/css/iphone_whatsapp_sms.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<div class="btn-clientes">
    <form action="index.php?controllers=Empleado&action=siguiente" method="post" class="atencion-cliente">
        <input class="btn-atencion verde"  type="submit" value="Siguiente">
    </form>

    <div class="atencion-cliente">
        <button class="btn-atencion azul" id="btn-llamar">Volver A Llamar</button>
    </div>

    <form action="index.php?controllers=Empleado&action=noPaso" method="post" class="atencion-cliente">
        <input  class="btn-atencion rojo" type="submit" value="No paso">
    </form>
</div>

<div class="imprimir">
    <div class="img-logo">
         <img src="assets/img/logo.png">
    </div>
    <h1>Turno Actual</h1>
    <?php if(isset($modulo)): ?>
        <h1><?=$user_turno->turno?></h1>
        <h2><?=$user_turno->modulo?></h2>
        <p><?=$user_turno->numero_documento?></p>
     
        <?php if(isset($tipo_cliente)): ?>
        <p><?=$tipo_cliente?></p>
   
        <p><?=$user_turno->fecha?> <?=$user_turno->hora?></p>
        <a href="index.php?controllers=Empleado&action=llamar">Llamar</a>
        <p><?=$user_turno->estado?></p>
        <?php endif; ?>
    </div>

    <?php endif; ?>
</div>
