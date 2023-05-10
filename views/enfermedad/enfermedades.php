<?php 
    require_once("../../database/database.php");
    require_once("../../database/consultas.php");

    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
    }
    if(isset($_GET["enf"])){
       $enf = $_GET["enf"];
       $result = $conn->prepare($sql5);  
       $result->execute(array(":dni"=>$dni,":enf"=>$enf));  
    }

    if(isset($_POST["add"])){
        $enfermedad = $_POST["enfermedad"];
    
        $sql = "INSERT INTO enfermedad_paciente VALUES (:dni,:enfermedad)";
                                            
        $result = $conn->prepare($sql);  
        $result->execute(array(":dni"=>$dni,":enfermedad"=>$enfermedad));                        
                        
    }

    $registros = array();
	$registros1=$conn->prepare($sql4);
	$registros1->execute(array(":dni"=>$dni));
	$registros=$registros1->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="enf.css">
    <title>Lista de enfermedades</title>
</head>
<body>
    <div class="container">
        <div class="lista">
            <ul class="list">
                <?php if($registros): ?>
                
                <?php foreach($registros as $key):?>
                <li class="item">
                    <?php echo $key["NOMBRE"]?>
                    <a class="delete" href="enfermedades.php?dni=<?php echo $dni?>&enf=<?php echo $key["ID"]?>">
                        Eliminar
                    </a>
                </li>
                <?php endforeach; ?>
                <?php else:?>   
                <div class="list-group">
                        <h4>No hay enfermedades registradas</h4>
                    </div>
                <?php endif;?>
            </ul>
        </div>
        <form name="form1" action="enfermedades.php?dni=<?php echo $dni?>" method="post">
            <div class="enfermedad">
                <select name="enfermedad" id="color" required>
                    <option value="" disabled selected>--- Elige Enfermedad ---</option>
                    <option value="1">Diabetes</option>
                    <option value="2">Obesidad</option>
                    <option value="3">Anemia</option>
                    <option value="4">Bulimia</option>
                    <option value="5">Aterosclerosis</option>
                    <option value="6">Celiaquía</option>
                    <option value="7">Anorexia</option>
                    <option value="8">Osteoporosis</option>
                    <option value="9">Cáncer</option>
                    <option value="10">Hipertensión arterial</option>
                    <option value="11">Hipercolesterolemia</option>
                </select>
            </div> 
            <div class="container-btn">
                <button type="submit" class="btn" name="add">Añadir</button>
            </div>
        </form>
        <a href="../../forms/registros/datos.php?dni=<?php echo $dni?>">
            <button class="btn btn-create">Volver</button>
        </a>
    </div>
</body>
</html>