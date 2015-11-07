<?php session_start();

$term=$_GET["term"];
include("scripts/datos.php");

$term=6;
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



	$res=$bd->query($sql);
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $v)
	{
		
		
		
	}
	
	

$sql="SELECT
		*
	FROM factura";
	$res=$bd->query($sql);
	foreach($res->fetchAll(PDO::FETCH_ASSOC) as $e)
	{
		
		
		
	}
	

	 
	
if (!empty($res))
{
	header('Content-type: text/plain');
	header("Content-Disposition: attachment; filename=\"lorem-$numero.ff\"");
print "
<Documento>

<Comprobante>
serie=A
folio=1
fecha=2013-01-15T12:59:29
tipoDeComprobante=ingreso
tituloDocumento=Factura
formadePago=Pago en una sola exhibicion
condicionesDePago=CONTADO
metodoDePago=TARJETA DE CREDITO
NumCtaPago=6767
subtotal=100.00
descuento=0.00
FactorRet=
Retencion=
iva=16.00
total=116.00
</Comprobante>

<Emisor>
eRFC= $e[rfc]
enombre= $e[nombre]
RegimenFiscal= $e[regimen]
eCalle= $e[calle]
eNoExterior= $e[no_exterior]
eNoInterior= $e[no_interior]
eColonia= $e[colonia]
elocalidad=$e[localidad]
ereferencia=$e[referencia]
eMunicipio=$e[municipio]
eEstado=$e[estado]
ePais=$e[pais]
ecodigoPostal=$e[cp]
etel=$e[tel]
eemail=$e[email]
</Emisor>

<Receptor>
rfc= $v[rfc]
nombre=$v[contacto]
calle= $v[direccion]
noExterior= $v[ne]
noInterior= $v[ni]
colonia= $v[colonia]
localidad= $v[localidad]
referencia=
municipio=$v[municipio]
estado=$v[estado]
pais=$v[pais]
codigoPostal=$v[cp]
tel=$v[telefono]
email=$v[email]
</Receptor>

<expedidoEn>
ex_calle=FCO. I MADERO
ex_noExterior=456
ex_noInterior=3
ex_colonia=CENTRO
ex_localidad=AGUASCALIENTES
ex_municipio=AGUASCALIENTES
ex_estado=AGUASCALIENTES
ex_pais=MEXICO
ex_codigoPostal=20002
</expedidoEn>

<Conceptos>
p01_cantidad=1
p01_unidad=PIEZA
p01_noIdentificacion=0001
p01_descripcion=PRODUCTO1
p01_valorUnitario=100.00
p01_importe=100.00
p01_factorIVA=16%
p01_cuentaPredial=
p01_Pedimento=
p01_fechaPedimento=
p01_aduana=
</Conceptos>

<Otros>
cant_letra=*** (CIENTO DIEZ Y SEIS PESOS 00/100 M.N.) ***
factoriva=16%
moneda=MXN
tipoCambio=1
observaciones=PRUEBA DE FACTURA
tipoImpresion=0
formato=CFDI_V10.DAT
expedicion=AGUASCALIENTES, AGS.
</Otros>

<addenda>
</addenda>

</Documento>
";
	die;
}
?>