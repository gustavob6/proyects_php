<?php
  require_once("model_database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyecto</title>
  <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="container">
  <div class="header">
    <h3>Doctor Nutricionista</h3>
    <a href="./forms/registro.php">
      <button class="btn">Añadir Paciente</button>
    </a>
  </div>

  <div class="item-container">
  <h3>Pacientes</h3>
    <?php foreach ($registros as $key):?>
        <div class="item-css">
          <div class="item">
            <div class="text">
              <div class="text-1">
              <?php echo $key["dni"]?>
              <?php echo $key["nombre"]?>
              <?php echo $key["Apellido"]?>
              </div>
            </div>
              
              <a href="verDieta.php?dni=<?php echo $key['dni']?>&dia=<?php echo "Lunes"?>">
                <button class="btn">Ver Dieta</button>
              </a>
              <a href="addDieta.php?dni=<?php echo $key['dni']?>">
              <button class="btn">Añadir Dieta</button>
              </a>
              <a href="./forms/datos.php?dni=<?php echo $key['dni']?>">
              <button class="btn">Datos del paciente</button>
              </a>
          </div>
        </div>
    <?php endforeach; ?>
  </div>
      </div> 
</body>
</html>