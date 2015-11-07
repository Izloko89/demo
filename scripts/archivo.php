

<?php 
 include("datos.php");
 
 $bd=new PDO($dsnw,$userw,$passw,$optPDO);	
  $res=$bd->query("SELECT MAX(id_articulo) FROM articulos;");
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $i=>$v){
		
		$aidi=$v[$id_articulo];
		print_r($v[$id_articulo]);
		echo($v[$id_articulo]);
		$aidi=$aidi+1;
	}
 
                             $clave=$aidi;
			     $destino='../imagenes';//nombre de la carpeta
                             $imagen= $_FILES['file']['name'];
                             $tipo_archivo = $_FILES['file']['type'];
                             $tamano_archivo = $_FILES['file']['size'];
                             $nomimag=$clave.'.jpg';
 
if (strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg" ))
        {
 
  if (move_uploaded_file($_FILES['file']['tmp_name'],$destino.'/'.$nomimag))
        {
		
	$path = $destino.'/'.$nomimag;
				//aqui instuccion sql

 
 
$sql="insert into articulos_imagen (id_articulo,path) values ($aidi,'$path')";
 
	
	$bd->query($sql);
 
 
		}}
							   ?>