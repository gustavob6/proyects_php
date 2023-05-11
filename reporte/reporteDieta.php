<?php 
ob_start();
?>

<?php 
    require_once("../database/database.php");
	require_once("../database/consultas.php");	
    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
    }        
	$registros = array();
		
	$registros1=$conn->prepare($sql7);
	$registros1->execute(array(":dni"=>$dni));
	$registros = $registros1->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./custom.css">
    <title>Document</title>
</head>
<body>
    <div class="table-container">
<table>
    <tr>
        <th>DIA</th>
        <th>TIPO</th>
        <th>ALIMENTO</th>
        <th>GRAMOS</th>
    </tr>
    <?php foreach ($registros as $key):?>
    <tr>
    <td><?php echo $key["DIA"]?></td>
    <td><?php echo $key["TIPO"]?></td>
    <td><?php echo $key["ALIMENTO"]?></td>
    <td><?php echo $key["GRAMOS"]?></td>
    </tr>
    <?php endforeach;?>
    </table>
    </div>
</body>
</html>

<?php 
$html = ob_get_clean();
require_once("../pdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("dieta.pdf",array("Attachment"=>false));

?>