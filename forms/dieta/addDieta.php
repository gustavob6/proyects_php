<?php 
require_once("../../database/database.php");
require_once("../../database/consultas.php");
$band = true;
if(isset($_GET["dni"])){
    $dni = $_GET["dni"];

    $num_dia = 1;
    $siguiente = "Martes";
    $dia = "Lunes";

    $registrosDias = array();
	$registros1=$conn->prepare($sql2);
	$registros1->execute(array(":dni"=>$dni));
	$registrosDias=$registros1->fetchAll();

    $num = $conn->prepare($sql6);
    $num->execute(array(":dni"=>$dni));
    $edad = $num->fetchColumn();

    if($edad >= 13 && $edad <= 18){
        $minkcal = 1600;
        $maxkcal = 2200;
    }else if($edad >= 19 && $edad <= 30){
        $minkcal = 2000;
        $maxkcal = 2400;
    }else if($edad >= 31 && $edad <= 51){
        $minkcal = 1800;
        $maxkcal = 2200;
    }else if($edad >= 52){
        $minkcal = 1600;
        $maxkcal = 2200;
    }else{
        $minkcal = 1200;
        $maxkcal = 1600;
    }

    foreach($registrosDias as $key){
        if($key["DIA"] == "Lunes"){
            $num_dia = 2;
            $siguiente = "Miercoles";
            $dia = "Martes";
        }else if($key["DIA"] == "Martes"){
            $num_dia = 3;
            $siguiente = "Jueves";
            $dia = "Miercoles";
        }else if($key["DIA"] == "Miercoles"){
            $num_dia = 4;
            $siguiente = "Viernes";
            $dia = "Jueves";
        }else if($key["DIA"] == "Jueves"){
            
            $num_dia = 5;
            $siguiente = "Sabado";
            $dia = "Viernes";
        }else if($key["DIA"] == "Viernes"){
            $num_dia = 6;
            $siguiente = "Domingo";
            $dia = "Sabado";
        }else if($key["DIA"] == "Sabado"){
            $num_dia = 7;
            $dia = "Domingo";
        }else if($key["DIA"] == "Domingo"){
            $band = false;
        }      
    }
}                                                                                       
                     
if(isset($_POST["add"])){
    $desayuno1 = $_POST["desayuno1"];
    $desayuno2 = $_POST["desayuno2"];
    $almuerzo1 = $_POST["almuerzo1"]; 
    $almuerzo2 = $_POST["almuerzo2"]; 
    $cena1 = $_POST["cena1"];
    $cena2 = $_POST["cena2"];
    $gdesayuno1 = $_POST["gdesayuno1"];
    $gdesayuno2 = $_POST["gdesayuno2"];
    $galmuerzo1 = $_POST["galmuerzo1"]; 
    $galmuerzo2 = $_POST["galmuerzo2"]; 
    $gcena1 = $_POST["gcena1"];
    $gcena2 = $_POST["gcena2"];

    $sql = "INSERT INTO dietas VALUES   (:dni,:dia,:tipo1,:desayuno1,:gdesayuno1,NOW()),
                                        (:dni,:dia,:tipo1,:desayuno2,:gdesayuno2,NOW()),
                                        (:dni,:dia,:tipo2,:almuerzo1,:galmuerzo1,NOW()),
                                        (:dni,:dia,:tipo2,:almuerzo2,:galmuerzo2,NOW()),
                                        (:dni,:dia,:tipo3,:cena1,:gcena1,NOW()),
                                        (:dni,:dia,:tipo3,:cena2,:gcena2,NOW())";

    $result=$conn->prepare($sql);  
    $result->execute(array(":dni"=>$dni,":dia"=>$num_dia,
                            ":tipo1"=>1,":tipo2"=>2,":tipo3"=>3,
                            ":desayuno1"=>$desayuno1,
                            ":gdesayuno1"=>$gdesayuno1,
                            ":desayuno2"=>$desayuno2,
                            ":gdesayuno2"=>$gdesayuno2,
                            ":almuerzo1"=>$almuerzo1,
                            ":almuerzo2"=>$almuerzo2,
                            ":galmuerzo1"=>$galmuerzo1,
                            ":galmuerzo2"=>$galmuerzo2,
                            ":cena1"=>$cena1,
                            ":cena2"=>$cena2,
                            ":gcena1"=>$gcena1,
                            ":gcena2"=>$gcena2));

                            header("Location:./addDieta.php?dni={$dni}");                        
                    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Añadir Dieta</title>
</head>
<body>
<header class="main-header">
	<a class="text-header" href="#">
		<span class="site-name">Nutricion 2.0</span>
	</a>
	<a class="text-header1" href="../../index.php">
		<span class="site-name">Volver</span>
    </a> 
</header>
<?php if($band):?> 
<form name="form1" action="addDieta.php?dni=<?php echo $dni?>" method="post">
<div class="container">
<h3><?php echo $dia ?></h3>
<h5><?php echo "Dado la edad del paciente {$edad} años lo recomendable son entre {$minkcal} kcal y {$maxkcal} kcal"?></h5>
    <div class="items">
        <label for="color">Desayuno</label>
        <div class="desayuno">
        <select name="desayuno1" id="color" required>
            <option value="" disabled selected>--- Elige Alimento ---</option>
            <option value="2">Pollo(150kcal X 100g)</option>
            <option value="1">Espinaca(23kcal X 100g)</option>
            <option value="3">Calabacin(17kcal X 100g)</option>
            <option value="4">Lentejas(116kcal X 100g)</option>
            <option value="5">Quinoa(120kcal X 100g)</option>
            <option value="6">Zanahoria(41kcal X 100g)</option>
            <option value="7">Aguacate(160kcal X 100g)</option>
            <option value="8">Nueces(654kcal X 100g)</option>
            <option value="9">Huevos(155kcal X 100g)</option>
            <option value="10">Tomate(18kcal X 100g)</option>
            <option value="11">Arroz Integral(116kcal X 100g)</option>
            <option value="13">Brocoli(34kcal X 100g)</option>
            <option value="12">Garbanzos(364kcal X 100g)</option>
            <option value="14">Salmon(209kcal X 100g)</option>
            <option value="15">Manzana(52kcal X 100g)</option>
        </select>
        <input type="number" placeholder="gr"name="gdesayuno1" min="10" max="900" required class="form-control">
        </div>
        <div class="desayuno1">
        <select name="desayuno2" id="color" required>
        <option value="" disabled selected>--- Elige Alimento ---</option>
            <option value="2">Pollo(150kcal X 100g)</option>
            <option value="1">Espinaca(23kcal X 100g)</option>
            <option value="3">Calabacin(17kcal X 100g)</option>
            <option value="4">Lentejas(116kcal X 100g)</option>
            <option value="5">Quinoa(120kcal X 100g)</option>
            <option value="6">Zanahoria(41kcal X 100g)</option>
            <option value="7">Aguacate(160kcal X 100g)</option>
            <option value="8">Nueces(654kcal X 100g)</option>
            <option value="9">Huevos(155kcal X 100g)</option>
            <option value="10">Tomate(18kcal X 100g)</option>
            <option value="11">Arroz Integral(116kcal X 100g)</option>
            <option value="13">Brocoli(34kcal X 100g)</option>
            <option value="12">Garbanzos(364kcal X 100g)</option>
            <option value="14">Salmon(209kcal X 100g)</option>
            <option value="15">Manzana(52kcal X 100g)</option>
        </select>
        <input type="number" placeholder="gr"name="gdesayuno2" min="10" max="900" required class="form-control">
        </div>
        <label for="color">Almuerzo</label>
        <div class="almuerzo">
        <select name="almuerzo1" id="color" required>
        <option value="">--- Elige Alimento ---</option>
        <option value="" disabled selected>--- Elige Alimento ---</option>
            <option value="2">Pollo(150kcal X 100g)</option>
            <option value="1">Espinaca(23kcal X 100g)</option>
            <option value="3">Calabacin(17kcal X 100g)</option>
            <option value="4">Lentejas(116kcal X 100g)</option>
            <option value="5">Quinoa(120kcal X 100g)</option>
            <option value="6">Zanahoria(41kcal X 100g)</option>
            <option value="7">Aguacate(160kcal X 100g)</option>
            <option value="8">Nueces(654kcal X 100g)</option>
            <option value="9">Huevos(155kcal X 100g)</option>
            <option value="10">Tomate(18kcal X 100g)</option>
            <option value="11">Arroz Integral(116kcal X 100g)</option>
            <option value="13">Brocoli(34kcal X 100g)</option>
            <option value="12">Garbanzos(364kcal X 100g)</option>
            <option value="14">Salmon(209kcal X 100g)</option>
            <option value="15">Manzana(52kcal X 100g)</option>
        </select>
        <input type="number"placeholder="gr" name="galmuerzo1" min="10" max="900" required class="form-control">
        </div>
        <div class="almuerzo1">
        <select name="almuerzo2" id="color" required>
        <<option value="" disabled selected>--- Elige Alimento ---</option>
            <option value="2">Pollo(150kcal X 100g)</option>
            <option value="1">Espinaca(23kcal X 100g)</option>
            <option value="3">Calabacin(17kcal X 100g)</option>
            <option value="4">Lentejas(116kcal X 100g)</option>
            <option value="5">Quinoa(120kcal X 100g)</option>
            <option value="6">Zanahoria(41kcal X 100g)</option>
            <option value="7">Aguacate(160kcal X 100g)</option>
            <option value="8">Nueces(654kcal X 100g)</option>
            <option value="9">Huevos(155kcal X 100g)</option>
            <option value="10">Tomate(18kcal X 100g)</option>
            <option value="11">Arroz Integral(116kcal X 100g)</option>
            <option value="13">Brocoli(34kcal X 100g)</option>
            <option value="12">Garbanzos(364kcal X 100g)</option>
            <option value="14">Salmon(209kcal X 100g)</option>
            <option value="15">Manzana(52kcal X 100g)</option>
        </select>
        <input type="number" placeholder="gr"name="galmuerzo2" min="10" max="900" required class="form-control">
        </div>
    <label for="color">Cena</label>
    <div class="cena">
        <select name="cena1" id="color" required>
        <option value="" disabled selected>--- Elige Alimento ---</option>
            <option value="2">Pollo(150kcal X 100g)</option>
            <option value="1">Espinaca(23kcal X 100g)</option>
            <option value="3">Calabacin(17kcal X 100g)</option>
            <option value="4">Lentejas(116kcal X 100g)</option>
            <option value="5">Quinoa(120kcal X 100g)</option>
            <option value="6">Zanahoria(41kcal X 100g)</option>
            <option value="7">Aguacate(160kcal X 100g)</option>
            <option value="8">Nueces(654kcal X 100g)</option>
            <option value="9">Huevos(155kcal X 100g)</option>
            <option value="10">Tomate(18kcal X 100g)</option>
            <option value="11">Arroz Integral(116kcal X 100g)</option>
            <option value="13">Brocoli(34kcal X 100g)</option>
            <option value="12">Garbanzos(364kcal X 100g)</option>
            <option value="14">Salmon(209kcal X 100g)</option>
            <option value="15">Manzana(52kcal X 100g)</option>
        </select>
        <input type="number"placeholder="gr" name="gcena1" min="10" max="900" required class="form-control">
        </div>
        <div class="cena1">
        <select name="cena2" id="color" required>
        <option value="" disabled selected>--- Elige Alimento ---</option>
            <option value="2">Pollo(150kcal X 100g)</option>
            <option value="1">Espinaca(23kcal X 100g)</option>
            <option value="3">Calabacin(17kcal X 100g)</option>
            <option value="4">Lentejas(116kcal X 100g)</option>
            <option value="5">Quinoa(120kcal X 100g)</option>
            <option value="6">Zanahoria(41kcal X 100g)</option>
            <option value="7">Aguacate(160kcal X 100g)</option>
            <option value="8">Nueces(654kcal X 100g)</option>
            <option value="9">Huevos(155kcal X 100g)</option>
            <option value="10">Tomate(18kcal X 100g)</option>
            <option value="11">Arroz Integral(116kcal X 100g)</option>
            <option value="13">Brocoli(34kcal X 100g)</option>
            <option value="12">Garbanzos(364kcal X 100g)</option>
            <option value="14">Salmon(209kcal X 100g)</option>
            <option value="15">Manzana(52kcal X 100g)</option>
        </select>
        <input type="number" placeholder="gr" name="gcena2" min="10" max="900" required class="form-control">
        </div>
    </div>
    
    <div>
        <button type="submit" name="add" class="btn">Añadir Dia</button>
    </div>
    </div>
</form>
</div>
<?php else:?>
    <div class="container-btn">
        <h3>Ya registro todos los dias</h3>
    </div>
<?php endif;?>

</body>
</html>