<?php
  	require_once("./database/database.php");
			
	$registros = array();
		
	$sql = "SELECT * FROM pacientes";
	$registros1=$conn->prepare($sql);
	$registros1->execute(array());
	$registros=$registros1->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Proyecto</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="main-header">
			<a class="text-header" href="#">
				<span class="site-name">Salud y Vida</span>
			</a> 
	</header>
	<div class="container">
		<div class="container-item">
		<div class="row">
			<div class="col-md-6">
				<h2 class="heading-section">Lista de Pacientes</h2>
				<a href="./forms/registros/registro.php">
      				<button class="btn btn-success">Añadir Paciente</button>
    			</a>
			</div>
		</div>
			<div class="row">
				<div class="col-md-6">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						      <th>Cedula</th>
						      <th>Nombre</th>
						      <th>Apellido</th>
						      <th>Fecha de Nacimiento</th>
							  <th>Acciones</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php foreach ($registros as $key):?>
						    <tr>
						      <th scope="row"><?php echo $key["dni"]?></th>
						      <td><?php echo $key["nombre"]?></td>
						      <td> <?php echo $key["Apellido"]?></td>
						      <td> <?php echo $key["fecha_nac"]?></td>
							  <td>
							  <a href="./views/dieta/verDieta.php?dni=<?php echo $key['dni']?>&dia=<?php echo "Lunes"?>">
                				<button class="btn btn-success">Ver Dieta</button>
              					</a>
              					<a href="./forms/dieta/addDieta.php?dni=<?php echo $key['dni']?>">
              						<button class="btn btn-success">Añadir Dieta</button>
              					</a>
              					<a href="./forms/registros/datos.php?dni=<?php echo $key['dni']?>">
              					<button class="btn btn-success">Datos del paciente</button>
              					</a>
							  </td>
						    </tr>
							<?php endforeach; ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>

