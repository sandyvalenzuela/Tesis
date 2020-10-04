<?php
include "../core/autoload.php";
include "../core/app/model/ProductoData.php";
include "../core/app/model/CategoriaData.php";

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();
$Productos = ProductoData::getAll();


$section1 = $word->AddSection();
$section1->addText("PRODUCTOS",array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Id");
$table1->addCell()->addText("Nombre");;
$table1->addCell()->addText("Presentacion");
$table1->addCell()->addText("Categoria");
$table1->addCell()->addText("Activo");
foreach($Productos as $Producto){
$table1->addRow();
$table1->addCell(500)->addText($Producto->id);
$table1->addCell(5000)->addText($Producto->nombre);
$table1->addCell(2000)->addText($Producto->presentacion);
if($Producto->Categoria_id!=null){
	$table1->addCell(2000)->addText($Producto->getCategoria()->nombre);

}else{
	$table1->addCell(2000)->addText("---");
}

}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios

$filename = "products-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // o echo file_get_contents ($ nombre de archivo);
unlink($filename);  // eliminar archivo temporal

?>