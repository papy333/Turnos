<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turnos</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="clientes-modulo">
        <div class="titulo">
            <h1>
                CURN
            </h1>
        </div>
        <table class="table table-striped table-hover text-center">
  <thead>
    <tr>
      <th scope="row">Turno</th>
      <td>Modulo</td>
    </tr>
  </thead>
  <tbody>
    <?php while($turno = $turnos->fetch_object()):
      if ($turno->modulo == "modulo 1") {
          $turno->turno .= "A";
      }

      if ($turno->modulo == "modulo 2") {
          $turno->turno .= "B";
      }

      if ($turno->modulo == "modulo 3") {
          $turno->turno .= "C";
      }
   ?>

    <tr>
      <th scope="row"><?=$turno->turno?></th>
      <td><?=$turno->modulo?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
    </div>
</body>
</html>
