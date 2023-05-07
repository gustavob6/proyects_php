<?php 
    require_once("../../database/database.php");
    require_once("../../database/consultas.php");

    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
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
    <title>Lista de enfermedades</title>
</head>
<body>
    <div class="container">
        <div class="lista">
            <ul class="list">
                <?php foreach($registros as $key):?>
                <li class="item">
                    <?php echo $key["NOMBRE"]?>
                </li>
                <?php endforeach; ?>
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
                    <option value="5">Quinoa</option>
                    <option value="6">Zanahoria</option>
                    <option value="7">Aguacate</option>
                    <option value="8">Nueces</option>
                    <option value="9">Huevos</option>
                    <option value="10">Tomate</option>
                </select>
            </div>
            <div>
                <button type="submit" name="add">Añadir</button>
            </div>
        </form>
        <a href="../../forms/registros/datos.php?dni=<?php echo $dni?>">
            <button class="button btn-create">Volver</button>
        </a>
    </div>
</body>
</html>