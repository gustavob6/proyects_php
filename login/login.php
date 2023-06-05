<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
  }
  require_once("../database/database.php");
  $alert = false;
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $sql = "SELECT * FROM USUARIOS WHERE username = :username and password = :password";
    $records = $conn->prepare($sql);
    $records->bindParam(':username', $_POST['username']);
    $records->bindParam(':password', $_POST['password']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = ' ';
    
    if ($results > 0 ) {
      $_SESSION['user_id'] = $results['username'];
      $_SESSION['id_usuario'] = $results['id'];
      header("Location: ../index.php");
    } else {
      $message = 'Contraseña o Usuario Incorrecto';
      $alert = true;
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
    <title>Iniciar Sesion</title>
</head>
<body>
  <header class="main-header">
        <a class="text-header" href="#">
          <span class="site-name">Nutricion 2.0</span>
        </a>
        <a class="text-header1" href="registro.php">
         <span class="site-name">Registrarse</span>
        </a> 
    </header>
    <div class="container">
      <h2>Inicio de Sesion</h2>
        <form action="login.php" method="post">
            <div class="item">
              <input type="text" name="username" class="form-control" required placeholder="username">
            </div>
            <div class="item">
              <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <div class="item-btn"> 
              <button type="submit" name="submit" class="button">Iniciar Sesion</button>
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