<?php 
require_once("../../database/database.php");
require_once("../../database/consultas.php");

if(isset($_POST["add"])){
    $dni = $_POST["dni"];
    $name = $_POST["name"];
    $last = $_POST["last"];
    $fecha = $_POST["nac"];
    $peso = $_POST["weight"];
    $altura = $_POST["height"];
    $masa = $_POST["masa"];
    $actividad = $_POST["activity"];

    $sql="INSERT INTO `PACIENTES` VALUES (:dni,:name1,:last1,:nac,:peso,:altura,:masa,:actividad)";
    $result=$conn->prepare($sql);  
    $result->execute(array(":dni"=>$dni,":name1"=>$name,
                            ":last1"=>$last,":nac"=>$fecha,":peso"=>$peso,":altura"=>$altura,
                            ":masa"=>$masa,":actividad"=>$actividad));
    header("Location:../index.php");
  }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cusstom.css">
    <title>Formulario</title>
</head>
<body>
    <div class="container">
                <form class="form" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="item">
                        <input type="number" name="dni"class="form-control" min="1111111" max="99999999" required
                            placeholder="Cedula" >
                    </div>
                    <div class="item">
                        <input type="text" name="name"class="form-control" maxlength="30" placeholder="Nombre" required>
                    </div>
                    <div class="item">
                        <input type="text" name="last" class="form-control" maxlength="30"placeholder="Apellido" required>
                    </div>
                    <div class="item">
                        <input type="date" name="nac" class="form-control" required>
                    </div>
                    <div class="item">
                        <input type="number" name="weight" min="30" max="140" placeholder="Peso (Kg)" required class="form-control">
                    </div> 
                    <div class="item">
                        <input type="number" name="height" min="80" max="240" placeholder="Altura (CM)" required class="form-control">
                    </div>
                    <div class="item">
                        <input type="number" name="masa" min="5" max="100" required class="form-control" 
                            placeholder="Masa Muscular %">
                    </div>   
                    <div class="item">
                        <input type="Text" name="activity" required class="form-control" maxlength="30" 
                        placeholder="Actividad Fisica">
                    </div>      
                    <div class="item">
                        <button type="submit" name="add"class="button btnCreate">Registrar Paciente</button>
                    </div>
                </form>
                <a href="../../index.php">
                    <button class="button">Volver</button>
                </a>
    </div>
</body>
</html>