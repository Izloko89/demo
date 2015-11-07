<?php session_start();
header("content-type: application/json");
include("datos.php");
$clave=$_POST["clave"];
$nombre=$_POST["nombre"];
$limitecredito=$_POST["limitecredito"];

$fecha = $_POST['fecha'];
$direccion = $_POST['direccion'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['mail'];

$rfc = $_POST['rfc'];
$razon = $_POST['razon'];
$nombrecomercial = $_POST['nombrecomercial'];
$direccion_fiscal = $_POST['direccion_fiscal'];
$colonia_fiscal = $_POST['colonia_fiscal'];
$ciudad_fiscal = $_POST['ciudad_fiscal'];
$estado_fiscal = $_POST['estado_fiscal'];
$cp_fiscal = $_POST['cp_fiscal'];
$pais_fiscal = $_POST['pais_fiscal'];
$contacto = $_POST['contacto'];

$ni_fiscal = $_POST['ni_fiscal'];
$ne_fiscal = $_POST['ne_fiscal'];
$localidad_fiscal = $_POST['localidad_fiscal'];
$municipio_fiscal = $_POST['municipio_fiscal'];
$tipo = $_POST['tipo'];

$pagina = $_POST['pagina'];
$montocredito = $_POST['montocredito'];
$diacredito = $_POST['diacredito'];
$descuento1 = $_POST['descuento1'];
$descuento2 = $_POST['descuento2'];
$descuento3 = $_POST['descuento3'];
$descuento4 = $_POST['descuento4'];
$descuento5 = $_POST['descuento5'];
$id_vendedor = $_POST['id_vendedor'];



	$sql=	"SELECT  count(`clave`) as cuenta
			FROM  `clientes` 
			WHERE clave = $clave"; 	

	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	$res=$bd->query($sql);
	$res=$res->fetchAll(PDO::FETCH_ASSOC);
	$cd=intval($res[0]["cuenta"]);
if($cd == 0){
	$sql="INSERT INTO `clientes`(`id_cliente`, `id_empresa`, `clave`, `nombre`, `fecha`, `limitecredito`
	, `id_vendedor`, `descuento1`, `descuento2`, `descuento3`, `descuento4`, `descuento5`
	, `montocredito`, `diacredito`
	
	) VALUES
								($clave,1,$clave,'$nombre','$fecha', '$limitecredito'
								, '$id_vendedor', '$descuento1', '$descuento2', '$descuento3', '$descuento4', '$descuento5'
								, '$montocredito', '$diacredito'
								);"; 	

	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	
	$bd->query($sql);
	
	$sql="INSERT INTO `clientes_contacto`(`id`, `id_empresa`, `id_cliente`, `clave`, `direccion`, `colonia`, `ciudad`, `estado`, `cp`, `telefono`, `celular`, `email`, `contacto`, `pagina`, `tipo`) VALUES
								($clave, 1,$clave,$clave,'$direccion','$colonia', '$ciudad', '$estado', '$cp', '$telefono', '$celular', '$email', '$contacto', '$pagina', '$tipo');"; 	

	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	
	$bd->query($sql);
	
	$sql="INSERT INTO `clientes_fiscal`(`id`, `id_empresa`, `id_cliente`, `rfc`, `razon`, `nombrecomercial`, `direccion`, `colonia`, `ciudad`, `estado`, `cp`, `pais`, `ni`, `ne`, `localidad`, `municipio`) VALUES 
		  ($clave, 1,$clave,'$rfc','$razon','$nombrecomercial', '$direccion_fiscal', '$colonia_fiscal', '$ciudad_fiscal', '$estado_fiscal', '$cp_fiscal', '$pais_fiscal', '$ni_fiscal', '$ne_fiscal', '$localidad_fiscal', '$municipio_fiscal');"; 	

	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	
	$bd->query($sql);
	
	$r["continuar"]=true;
$r["query"]=$sql;
	echo json_encode($r);
}
else{
	$sql="UPDATE `clientes` SET `id_cliente`=$clave, `id_empresa`=1, `clave`=$clave, `nombre`='$nombre', `fecha`='$fecha', `limitecredito`='$limitecredito'
	, `id_vendedor`='$id_vendedor', `descuento1`='$descuento1', `descuento2`='$descuento2', `descuento3`='$descuento3', `descuento4`='$descuento4'
	, `descuento5`='$descuento5', `montocredito`='$montocredito', `diacredito`='$diacredito'
	where id_cliente=$clave;";

	
	
	
	
	
	
	
	
	
	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	
	$bd->query($sql);
	
	$sql="UPDATE `clientes_contacto` SET `id`=$clave, `id_empresa`=1, `id_cliente`=$clave, `clave`=$clave, 
		`direccion`='$direccion', `colonia`='$colonia', `ciudad`='$ciudad', `estado`='$estado', `cp`='$cp', 
		`telefono`='$telefono', `celular`='$celular', `email`='$email', `contacto`='$contacto', `pagina`='$pagina'
, `tipo`='$tipo'
		where id=$clave;"; 	
		
		
		
		
	
		
		

	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	
	$bd->query($sql);
	
	$sql="UPDATE `clientes_fiscal` SET `id`=$clave, `id_empresa`=1, `id_cliente`=$clave, `rfc`='$rfc', `razon`='$razon', 
		`nombrecomercial`='$nombrecomercial', `direccion`='$direccion_fiscal', `colonia`='$colonia_fiscal', `ciudad`='$ciudad_fiscal',
		`estado`='$estado_fiscal', `cp`='$cp_fiscal' , `pais`='$pais_fiscal', `ni`='$ni_fiscal'
		, `ne`='$ne_fiscal', `localidad`='$localidad_fiscal', `municipio`='$municipio_fiscal'
		where id=$clave;"; 	

		
		
		
	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	
	$bd->query($sql);
	
	$r["update"]=true;

	echo json_encode($r);
}
?>