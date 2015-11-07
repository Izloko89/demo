<?php session_start();
header("Content-type: application/json");
$empresaid=$_SESSION["id_empresa"];
include("datos.php");



				
$nombre = $_POST['nombre'];
$puesto = $_POST['puesto'];
$clave = $_POST['clave'];
$direccion = $_POST['direccion'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$rfcf = $_POST['rfcf'];
$direccionf = $_POST['direccionf'];
$coloniaf = $_POST['coloniaf'];
$ciudadf = $_POST['ciudadf'];
$estadof = $_POST['estadof'];
$cpf = $_POST['cpf'];

	$bd=new PDO($dsnw, $userw, $passw, $optPDO);


try{	
		$sql= "insert into empleados (nombre,puesto) values ('$nombre','$puesto')";
			$bd->query($sql);
	
	
		
	
	$sql="SELECT MAX(id_empleado) as id FROM empleados";
	$res=$bd->query($sql);
	$res=$res->fetchAll(PDO::FETCH_ASSOC);
	$adidi=$res[0]["id"];
	
	$sql = "insert into empleados_contacto (id_empleado,puesto,direccion,colonia,ciudad,estado,cp,telefono,celular,email)values
	($adidi,'$puesto','$direccion','$colonia','$ciudad','$estado','$cp','$telefono','$celular','$email')";
	$bd->query($sql);
	
	$bd->query("insert into empleados_fiscal (id_empleado,rfc,direccion,colonia,ciudad,estado,cp) values
	('$adidi','$rfcf','$direccionf','$coloniaf','$ciudadf','$estadof','$cpf')");
	
	$r["continuar"]=true;
	$r["query"]=$sql;
}catch(PDOException $err){
	$r["continuar"]=false;
	$r["info"]=$err->getMessage();
	//echo $err->getMessage();
}
echo json_encode($r);
?>