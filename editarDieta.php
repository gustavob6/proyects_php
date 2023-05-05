<?php
  require_once("database.php");
  if(isset($_GET["dni"]) && isset($_GET["dia"])){
    $dni = $_GET["dni"];
    $dia = $_GET["dia"];

    if($_GET["dia"] == "Lunes"){
        $num_dia = 1;
    }else if($_GET["dia"] == "Martes"){
        $num_dia = 2;
    }else if($_GET["dia"] == "Miercoles"){
        $num_dia = 3;
    }else if($_GET["dia"] == "Jueves"){
        $num_dia = 4;
    }else if($_GET["dia"] == "Viernes"){
        $num_dia = 5;
    }else if($_GET["dia"] == "Sabado"){
        $num_dia = 6;
    }else if($_GET["dia"] == "Domingo"){
        $num_dia = 7;
    }
}

  if(isset($_POST["update"])){
    $sql1="DELETE FROM `dietas` WHERE id_dieta='$dni' and dia_id = '$num_dia'";
    $conn->query($sql1);

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

    $sql = "INSERT INTO dietas VALUES   (:dni,:dia,:tipo1,:desayuno1,:gdesayuno1),
                                        (:dni,:dia,:tipo1,:desayuno2,:gdesayuno2),
                                        (:dni,:dia,:tipo2,:almuerzo1,:galmuerzo1),
                                        (:dni,:dia,:tipo2,:almuerzo2,:galmuerzo2),
                                        (:dni,:dia,:tipo3,:cena1,:gcena1),
                                        (:dni,:dia,:tipo3,:cena2,:gcena2)";

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

                            header("Location:./verDieta.php?dni={$dni}&dia={$dia}");                        
                    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Dieta</title>
</head>
<body>
<form name="form1" action="editarDieta.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>" method="post">
<h3><?php echo $dia ?></h3>
    <div class="Desayuno">
        <label for="color">Desayuno</label>
        <select name="desayuno1" id="color" required>
            <option value="">--- Elige Alimento ---</option>
            <option value="2">Pollo</option>
            <option value="1">Espinaca</option>
            <option value="3">Calabacin</option>
            <option value="4">Lentejas</option>
            <option value="5">Quinoa</option>
            <option value="6">Zanahoria</option>
            <option value="7">Aguacate</option>
            <option value="8">Nueces</option>
            <option value="9">Huevos</option>
            <option value="10">Tomate</option>
            <option value="11">Arroz Integral</option>
            <option value="12">Pescado</option>
            <option value="13">Garbanzos</option>
            <option value="14">Brocoli</option>
            <option value="15">Manzana</option>
        </select>
        <input type="number" name="gdesayuno1" min="10" max="200" required class="form-control">
        <select name="desayuno2" id="color" required>
        <option value="">--- Elige Alimento ---</option>
            <option value="2">Pollo</option>
            <option value="1">Espinaca</option>
            <option value="3">Calabacin</option>
            <option value="4">Lentejas</option>
            <option value="5">Quinoa</option>
            <option value="6">Zanahoria</option>
            <option value="7">Aguacate</option>
            <option value="8">Nueces</option>
            <option value="9">Huevos</option>
            <option value="10">Tomate</option>
            <option value="11">Arroz Integral</option>
            <option value="12">Pescado</option>
            <option value="13">Garbanzos</option>
            <option value="14">Brocoli</option>
            <option value="15">Manzana</option>
        </select>
        <input type="number" name="gdesayuno2" min="10" max="200" required class="form-control">
    </div>
    <div class="almuerzo">
        <label for="color">Almuerzo</label>
        <select name="almuerzo1" id="color" required>
        <option value="">--- Elige Alimento ---</option>
            <option value="2">Pollo</option>
            <option value="1">Espinaca</option>
            <option value="3">Calabacin</option>
            <option value="4">Lentejas</option>
            <option value="5">Quinoa</option>
            <option value="6">Zanahoria</option>
            <option value="7">Aguacate</option>
            <option value="8">Nueces</option>
            <option value="9">Huevos</option>
            <option value="10">Tomate</option>
            <option value="11">Arroz Integral</option>
            <option value="12">Pescado</option>
            <option value="13">Garbanzos</option>
            <option value="14">Brocoli</option>
            <option value="15">Manzana</option>
        </select>
        <input type="number" name="galmuerzo1" min="10" max="200" required class="form-control">
        <select name="almuerzo2" id="color" required>
        <option value="">--- Elige Alimento ---</option>
            <option value="2">Pollo</option>
            <option value="1">Espinaca</option>
            <option value="3">Calabacin</option>
            <option value="4">Lentejas</option>
            <option value="5">Quinoa</option>
            <option value="6">Zanahoria</option>
            <option value="7">Aguacate</option>
            <option value="8">Nueces</option>
            <option value="9">Huevos</option>
            <option value="10">Tomate</option>
            <option value="11">Arroz Integral</option>
            <option value="12">Pescado</option>
            <option value="13">Garbanzos</option>
            <option value="14">Brocoli</option>
            <option value="15">Manzana</option>
        </select>
        <input type="number" name="galmuerzo2" min="10" max="200" required class="form-control">
    </div>
    <div class="cena">
    <label for="color">Cena</label>
        <select name="cena1" id="color" required>
        <option value="">--- Elige Alimento ---</option> 
            <option value="2">Pollo</option>
            <option value="1">Espinaca</option>
            <option value="3">Calabacin</option>
            <option value="4">Lentejas</option>
            <option value="5">Quinoa</option>
            <option value="6">Zanahoria</option>
            <option value="7">Aguacate</option>
            <option value="8">Nueces</option>
            <option value="9">Huevos</option>
            <option value="10">Tomate</option>
            <option value="11">Arroz Integral</option>
            <option value="12">Pescado</option>
            <option value="13">Garbanzos</option>
            <option value="14">Brocoli</option>
            <option value="15">Manzana</option>
        </select>
        <input type="number" name="gcena1" min="10" max="200" required class="form-control">
        <select name="cena2" id="color" required>
        <option value="">--- Elige Alimento ---</option>
            <option value="2">Pollo</option>
            <option value="1">Espinaca</option>
            <option value="3">Calabacin</option>
            <option value="4">Lentejas</option>
            <option value="5">Quinoa</option>
            <option value="6">Zanahoria</option>
            <option value="7">Aguacate</option>
            <option value="8">Nueces</option>
            <option value="9">Huevos</option>
            <option value="10">Tomate</option>
            <option value="11">Arroz Integral</option>
            <option value="12">Pescado</option>
            <option value="13">Garbanzos</option>
            <option value="14">Brocoli</option>
            <option value="15">Manzana</option>
        </select>
        <input type="number" name="gcena2" min="10" max="200" required class="form-control">
    </div>
    
    <div>
        <button type="submit" name="update">Actualizar</button>
    </div>
</form>
<a href="index.php">
         <button class="btn">Pagina Principal</button>
        </a>
</body>
</html>