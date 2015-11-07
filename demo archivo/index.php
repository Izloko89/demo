<?php session_start();

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
	 
	
if (!empty($res['rfc']))
{
	// ahora si, que comience la magia
	header('Content-type: text/plain');
	header("Content-Disposition: attachment; filename=\"lorem-$numero.ff\"");
	
print '
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
eRFC=AAA010101AAA
enombre=EMISOR S.A. DE C.V.
RegimenFiscal=PERSONAS MORALES DEL REGIMEN GENERAL
eCalle=HEROE DE NACOZARI
eNoExterior=135
eNoInterior=2
eColonia=BOSQUES
elocalidad=AGUASCALIENTES
ereferencia=
eMunicipio=AGUASCALIENTES
eEstado=AGUASCALIENTES
ePais=MEXICO
ecodigoPostal=20000
etel=9000000
eemail=contacto@emisor.com
</Emisor>

<Receptor>
rfc=XAXX010101000
nombre=EMPRESA S.A. DE C.V.
calle=LUIS DONALDO COLOSIO
noExterior=987
noInterior=12
colonia=CD. INDUSTRIAL
localidad=AGUASCALIENTES
referencia=
municipio=AGUASCALIENTES
estado=AGUASCALIENTES
pais=MEXICO
codigoPostal=20001
tel=9111111
email=contacto@receptor.com
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
';
	die;
}
?>