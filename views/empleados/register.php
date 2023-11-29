<div class="register-empleado">
    <div class="img-logo">
    	<img src="assets/img/logo.png">
	</div>
    <h2>Ingrese Sus Datos</h2>
    <form action="index.php?controllers=Empleado&action=registerEmpleado" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos">

        <label for="email">Correo</label>
        <input type="text" name="email">

        <label for="password">Contraseña</label>
        <input type="password" name="password">

        <input type="submit" value="Registrar">
    </form>
</div>