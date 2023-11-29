<?php if(isset($admin)): ?>
	<?php $admin_user = "index.php?controllers=Empleado&action=register"; ?>
<?php else: ?>
	<?php $admin_user ="index.php?controllers=Empleado&action=modulo";?> 
<?php endif; ?>
	<div class="box">
		<div class="logo-imgs">
			<img src="assets/img/logo.png">
		</div>
		<?php if(isset($admin)): ?>
		<h2>Iniciar Admin</h2>
		<?php endif; ?>

		<?php if(!isset($admin)): ?>
		<h2>Iniciar Session</h2>
		<?php endif; ?>

		<form action="<?=$admin_user?>" method="POST" id="form">
			<div class="inputBox">
				<input type="text" name="email" required>
				<label for="">Email</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required>
				<label for="">PassWord</label>
				<span id="error"></span>
			</div>
			<?php if(!isset($admin)): ?>
			<div class="inputBtn">
			<input type="submit" value="Iniciar Session">
			</div>
			<?php endif; ?>
			<?php if(isset($admin)): ?>
			<div class="inputBtn">
			<input type="submit" value="Iniciar Admin">
			</div>
			<?php endif; ?>
			<?php if(!isset($admin)): ?>
			<div class="enlaces">
				<a href="index.php?controllers=Empleado&action=index&admin">Registrar Empleado</a>
			</div>
			<?php endif; ?>
			<?php if(isset($admin)): ?>
			<div class="enlaces">
				<a href="index.php?controllers=Empleado&action=index">Iniciar Session</a>
			</div>
			<?php endif; ?>
	</form>
</div>