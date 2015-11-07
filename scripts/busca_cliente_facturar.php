<?php session_start();
header("Content-type: application/json");
$empresaid=$_SESSION["id_empresa"];
$term=$_GET["term"];
include("datos.php");

try{
	$bd=new PDO($dsnw, $userw, $passw, $optPDO);
		
$sql="	select 
clientes_fiscal.rfc,
clientes_contacto.contacto,
clientes_fiscal.direccion, 
clientes_fiscal.ne,
clientes_fiscal.ni,
clientes_fiscal.colonia,
clientes_fiscal.localidad,
clientes_fiscal.municipio,
clientes_fiscal.estado,
clientes_fiscal.pais,
clientes_fiscal.cp,
clientes_contacto.telefono,
clientes_contacto.email 

from clientes_fiscal 

inner join clientes_contacto on clientes_contacto.id = clientes_fiscal.id
 and clientes_fiscal.id='$term'";
;


	$res=$bd->query($sql);
	$res=$res->fetchAll(PDO::FETCH_ASSOC);
	
}catch(PDOException $err){
	echo $err->getMessage();
}

echo json_encode($r);
?>
