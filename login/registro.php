<?php
     session_start();
     
     if (isset($_SESSION['user_id'])) {
        header('Location: ../index.php');
    }		
    $alert = false;
    $message = " ";
    require_once("../database/database.php");
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $sql = "SELECT * FROM USUARIOS WHERE username = :username";
      $records = $conn->prepare($sql);
      $records->bindParam(':username', $_POST['username']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      $message = ' ';
      
      if ($results > 0 ) {
        $message = 'Usuario ya existente';
        $alert = true;
      } else {
        if(isset($_POST['submit'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $sql="INSERT INTO `usuarios` VALUES (NULL,:username,:password)";
          $result=$conn->prepare($sql);  
          $result->execute(array(":username"=>$username,":password"=>$password));
          header("Location:login.php");
      }
      }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registrarse</title>
</head>
<body>
    <header class="main-header">
        <a class="text-header" href="#">
          <span class="site-name">Nutricion 2.0</span>
        </a>
        <a class="text-header1" href="login.php">
         <span class="site-name">Inicio de Sesion</span>
        </a> 
    </header>
    <div class="container">
        <h2>Registro</h2>
        <form action="registro.php" method="post">
        <div class="item">
              <input type="text" name="username" class="form-control" required placeholder="username">
            </div>
            <div class="item">
              <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <div class="item-btn"> 
              <button type="submit" name="submit" class="button">Registrarse</button>
            </div>
        </form>
        <div class="text">
          <?php if($alert): ?>
            <p class="alert"><?php echo $message?></p>
          <?php endif;?>  
        </div>
    </div>
</body>
</html>