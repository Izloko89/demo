<?php session_start();
header("Content-type: application/json");
$empresaid=$_SESSION["id_empresa"];
$term=$_GET["term"];
include("datos.php");

try{
	$bd=new PDO($dsnw, $userw, $passw, $optPDO);
	//sacar los campos para acerlo más autoámtico
	$campos=array();
	$res=$bd->query("DESCRIBE clientes;");
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $a=>$c){
		$campos[$a]=$c["Field"];
	}
	
	$res=$bd->query("SELECT * FROM clientes WHERE id_empresa=$empresaid AND nombre LIKE '$term%' OR clave = '$term';");
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $i=>$v){
		$temp = $v["id_vendedor"];
		//$r[$i]= $v["id_vendedor"];
		$r[$i]["label"]=$v["nombre"];
		$r[$i]["form"]="#f_clientes";
		foreach($campos as $campo){
			$r[$i][$campo]=$v[$campo];
		}
	}
	$res=$bd->query("SELECT usuario from usuarios where id_usuario = '$temp';");
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $i=>$v){
		$r["nombre_usuario"] = $v["usuario"];
		
	}
	
}catch(PDOException $err){
	echo $err->getMessage();
}

echo json_encode($r);
?>