<?php session_start(); 
include("../scripts/funciones.php");
include("../scripts/func_form.php");
include("../scripts/datos.php");
$emp=$_SESSION["id_empresa"];

try{
	$bd=new PDO($dsnw,$userw,$passw,$optPDO);
	$sql="SELECT
		*
	FROM clientes
	WHERE clientes.id_empresa=$emp;";
	$res=$bd->query($sql);
	$articulos=array();
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $d){
		$clientes[$d["id_cliente"]]=$d;
	}
}catch(PDOException $err){
	echo "Error: ".$err->getMessage();
}

?>
<style>
.dbc{
	cursor:pointer;
	color:#900;
}
.guardar1{
	padding:10px;
}
</style>
<script src="js/formularios.js"></script>

<script>


$("#clave").on("change keyup paste", function(){
	//alert("entrando en el evento");
   //realizaProceso($('#clave').val());return false;
})




</script>


<?php 	

$sql="SELECT
		*
	FROM factura";
	$res=$bd->query($sql);
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $v)
	{
		
		
		
	}
	
?>
<form id="f_clientes" class="formularios">
  <h3 class="titulo_form">CLIENTE</h3>
 
   
    <div class="campo_form">
    <label class="label_width">RFC</label>
    <input type="text" name="rfc" id="rfc"  class="requerido mayuscula rfc" value="<?php echo $v["rfc"]; ?>">
    </div>
    <div class="campo_form">
    <label class="label_width">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="nombre text_mediano" value="<?php echo $v["nombre"]; ?>">
    </div>
	 <div class="campo_form">
        <label class="label_width">Regimen Fiscal</label>
        <input type="text" name="regimen"id="regimen" class="requerido mayuscula regimen" value="<?php echo $v["regimen"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Calle</label>
        <input type="text" name="calle"  id="calle"class="calle" value="<?php echo $v["calle"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Numero Exterior</label>
        <input type="text" name="no_exterior" id="no_exterior" class="requerido no_exterior" value="<?php echo $v["no_exterior"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Numero Interior</label>
        <input type="text" name="no_interior"  id="no_interior"class="requerido  no_interior" value="<?php echo $v["no_interior"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Colonia</label>
        <input type="text" name="colonia"  id="colonia"class="requerido colonia colonia" value="<?php echo $v["colonia"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Localidad</label>
        <input type="text" name="localidad" id="localidad" class="requerido localidad" value="<?php echo $v["localidad"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Referencia</label>
        <input type="text" name="referencia"id="referencia" class="referencia" value="<?php echo $v["referencia"]; ?>">
    </div>
	<div class="campo_form">
        <label class="label_width">Municipio</label>
        <input type="text" name="municipio" id="municipio"class="municipio" value="<?php echo $v["municipio"]; ?>">
    </div>
    <div class="campo_form">
        <label class="label_width">Estado</label>
        <input type="text" name="estado" id="estado"class="requerido estado" value="<?php echo $v["estado"]; ?>">
    </div>
	 <div class="campo_form">
        <label class="label_width">Pais</label>
        <input type="text" name="pais"  id="pais"class="requerido pais" value="<?php echo $v["pais"]; ?>">
    </div>
	 <div class="campo_form">
        <label class="label_width">Codigo Postal</label>
        <input type="text" name="cp" id="cp"class="requerido cp" value="<?php echo $v["cp"]; ?>">
    </div>
	 <div class="campo_form">
        <label class="label_width">Telefono</label>
        <input type="text" name="telefono"id="telefono" class="requerido telefono" value="<?php echo $v["tel"]; ?>">
    </div>
	 <div class="campo_form">
        <label class="label_width">Email</label>
        <input type="text" name="email" id="email" class="requerido email" value="<?php echo $v["email"]; ?>">
    </div>
   
</form>


	
	
	
	
    <div align="right">
	
	<?php
	if($v["rfc"]!="")
	{
		
		?>
		<input type="button" class="modificar" id="modificar" value="MODIFICAR" style="" onclick="agregar_datos(this.id);" />
		<?php
		
	}
	else
	{
		
		?>
		  <input type="button" class="guardar1" id="guardar" value="GUARDAR" onclick="agregar_datos(this.id);" />
		<?php
	}
	?>
      
        
    	<input type="button" class="volver" value="VOLVER">
    </div>
	
	
</div>

<script>
 function agregar_datos(decidir)
{
	alert(decidir);
	
	var rfc = document.getElementById("rfc").value;
	var nombre= document.getElementById("nombre").value;
	var regimen= document.getElementById("regimen").value;
	
	
	calle = document.getElementById("calle").value;
	no_exterior = document.getElementById("no_exterior").value;
	no_interior = document.getElementById("no_interior").value;
	colonia = document.getElementById("colonia").value;
	localidad = document.getElementById("localidad").value;
	referencia = document.getElementById("referencia").value;
	municipio = document.getElementById("municipio").value;
	estado = document.getElementById("estado").value;
	pais = document.getElementById("pais").value;
	telefono = document.getElementById("telefono").value;
	cp = document.getElementById("cp").value;
	email = document.getElementById("email").value;
	
	if(decidir.value=="modificar")
	{
			$.ajax({
	  url:"scripts/modificar_datos_facturar.php",
	  cache:false,method: "POST",
	  data:{
		'rfc':rfc,
		'nombre':nombre,
		'regimen':regimen,
		'calle':calle,
		'no_exterior':no_exterior,
		'no_interior':no_interior,
		'colonia':colonia,
		'localidad':localidad,
		'referencia':referencia,
		'municipio':municipio,
		'estado':estado,
		'pais':pais,
		'telefono':telefono,
		'cp':cp,
		'email': email
	  },
	  success: function(r){
		alerta("info","datos agregados exitosamente");
		
	  }
	})
		
	}
	
	if(decidir.value=="guardar")
	{
			$.ajax({
	  url:"scripts/agrega_datos_facturar.php",
	  cache:false,method: "POST",
	  data:{
		'rfc':rfc,
		'nombre':nombre,
		'regimen':regimen,
		'calle':calle,
		'no_exterior':no_exterior,
		'no_interior':no_interior,
		'colonia':colonia,
		'localidad':localidad,
		'referencia':referencia,
		'municipio':municipio,
		'estado':estado,
		'pais':pais,
		'telefono':telefono,
		'cp':cp,
		'email': email
	  },
	  success: function(r){
		alerta("info","datos agregados exitosamente");
		
	  }
	})
		
	}

	

	
	
	;
	
	
}
</script>