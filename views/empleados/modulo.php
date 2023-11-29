<h2>Bienvenido <?=$empleado_login->nombre?> <?=$empleado_login->apellidos?></h2>
<h2>Eligir Modulo Correspondiente</h2>
<div class="elegir-modulo">
    <a href="index.php?controllers=Empleado&action=atencion&modulo_1">
        <div class="modulos">
            <h3>Modulo 1</h3>
        </div>
    </a>

    <a href="index.php?controllers=Empleado&action=atencion&modulo_2">
        <div class="modulos">
            <h3>Modulo 2</h3>
        </div>
    </a>

    <a href="index.php?controllers=Empleado&action=atencion&modulo_3">
        <div class="modulos">
            <h3>Modulo 3</h3>
        </div>
    </a>
</div>