<?php session_start();
header("Content-type: application/json");

include("datos.php");

$rfc = $_POST["rfc"];
$nombre = $_POST["nombre"];
$regimen = $_POST["regimen"];
$calle = $_POST["calle"];
$no_exterior = $_POST["no_exterior"];
$no_interior = $_POST["no_interior"];
$colonia = $_POST["colonia"];
$localidad = $_POST["localidad"];
$referencia = $_POST["referencia"];
$municipio = $_POST["municipio"];
$estado = $_POST["estado"];
$pais = $_POST["pais"];
$telefono = $_POST["telefono"];
$cp = $_POST["cp"];
$email = $_POST["email"];
	



	$bd=new PDO($dsnw, $userw, $passw, $optPDO);


try{	
	$bd->query("insert into factura(rfc,nombre,regimen,calle,no_interior,no_exterior,colonia,localidad,referencia,municipio,estado,
	pais,cp,tel,email)
	values ('$rfc','$nombre','$regimen','$calle','$no_interior','$no_exterior','$colonia','$localidad','$referencia','$municipio','$estado','$pais','$cp','$telefono','$email')");
	
	
	
	
	
	
	echo true;
}catch(PDOException $err){
	echo $err->getMessage();
	echo false;
}
?>