<?php
 ob_start();
?>
<?php 
    require_once("../database/database.php");
	require_once("../database/consultas.php");	
    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
    }
	$sql8 = "SELECT * FROM pacientes where dni = :dni";
	$tipo = " ";    
	$dia = " ";    
	$registros = array();
	$registros1=$conn->prepare($sql7);
	$registros1->execute(array(":dni"=>$dni));
	$registros = $registros1->fetchAll();

	$records = $conn->prepare($sql8);
    $records->bindParam(':dni', $dni);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Reporte PDF</title>
	  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<style>
		.container{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}
		table{
			width:100%
		}
		.table-container{
			display: flex;
			width: 100%;
			justify-content: center;
			align-items: center;
		}
		
		td,th{
			border: 1px solid #dbdbdb;
			border-radius: 4px;
			font-family: arial, sans-serif;
			text-align: center;
			line-height: 10px;
			width: 70px;
			padding: 3px 10px;
			font-size:12px
		}
		.title{
			display:flex;
			justify-content:center;
			align-items:center;
			text-align:center;
		}
		.heading-section{
			font-size: 20px;
			font-family: 'Times New Roman', Times, serif;
		}
	</style>
	
	<body>
		<div class="container">
			<div class="title">
				<p class="heading-section">
					Reporte de dieta
				</p>
			</div>
			<div class="table-container">
						<table class="table">
						<thead class="thead-primary">
						    <tr>
						      <th>Cedula</th>
						      <th>Nombre</th>
						      <th>Apellido</th>
						      <th>Fecha de Nacimiento</th>
				   			 </tr>
						  </thead>
						<tbody>	
						 <tr>
						      <td><?php echo $results["dni"]?></td>
						      <td><?php echo $results["nombre"]?></td>
						      <td><?php echo $results["Apellido"]?></td>
						      <td><?php echo $results["fecha_nac"]?></td>
				   		</tr>
						</tbody>
						<tbody>	
						<tbody>	
						 <tr>  
				   		</tr>
						</tbody>
						</tbody>
						  <thead class="thead-primary">
						    <tr>
						      <th>Dia</th>
						      <th>Tipo</th>
						      <th>Alimento</th>
						      <th>Gramos</th>
				   			 </tr>
						  </thead>
						  <tbody>
						  <?php foreach ($registros as $key):?>
						    <tr>
							<?php if($key["DIA"] !== $dia): ?>
                			<?php $dia = $key["DIA"] ?>
						      <th scope="row"><?php echo $key["DIA"]?></th>
							<?php else:?> 
							<th scope="row"> </th>
							<?php endif;?>
							<?php if($key["TIPO"] !== $tipo): ?>
                			<?php $tipo = $key["TIPO"] ?>
						      <td><?php echo $key["TIPO"]?></td>
							  <?php else:?> 
								<td> </td>
							<?php endif;?>
						      <td><?php echo $key["ALIMENTO"]?></td>
						      <td><?php echo $key["GRAMOS"]?></td>
						    </tr>
						    <?php endforeach;?>
						  </tbody>
						</table>
					</div>
		</div>
</body>
</html>
<?php
$html = ob_get_clean();
require_once("../pdf/autoload.inc.php");
use Dompdf\Dompdf;


$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('letter');


$dompdf->render();

$dompdf->stream("dieta.pdf",array("Attachment"=>false));
?>
