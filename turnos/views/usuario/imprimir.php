<div class="imprimir">
    <div class="img-logo">
         <img src="asset/img/4.png">
    </div>
    <h1>Su Turno</h1>
    <?php
        $turno = $_SESSION['turno'];
    ?>

        <p class="turno"><?=$suTurno->turno?></p>
        <p class="turno"><?=$suTurno->prioridad?></p>
        <h2><?=$turno['modulo'];?></h2>
        <p><?=$turno['documento'];?></p>
        <p><?=date("d-m-Y h:i:s a");?></p>

</div>

