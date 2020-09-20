<?php


if(count($_POST)>0){
  $Producto = new ProductoData();
  $Producto->nombre = $_POST["nombre"];
  $Producto->descripcion = $_POST["descripcion"];
  $Producto->presentacion = $_POST["presentacion"];
  $Categoria_id="NULL";
  if($_POST["Categoria_id"]!=""){ $Categoria_id=$_POST["Categoria_id"];}
  $Producto->Categoria_id=$Categoria_id;
  $Producto->Usuario_id = $_SESSION["Usuario_id"];


  if(isset($_FILES["image"])){
    $image = new Upload($_FILES["image"]);
    if($image->uploaded){
      $image->Process("storage/Productos/");
      if($image->processed){
        $Producto->image = $image->file_dst_name;
        $prod = $Producto->add_with_image();
      }
    }else{

  $prod= $Producto->add();
    }
  }
  else{
  $prod= $Producto->add();

  }

if($_POST["q"]!="" || $_POST["q"]!="0"){
 $op = new OperacionData();
 $op->Producto_id = $prod[1] ;
 $op->operacion_tipo_id=OperacionTipoData::getByName("entrada")->id;
 $op->q= $_POST["q"];
 $op->sell_id="NULL";
$op->is_oficial=1;
$op->add();
}

print "<script>window.location='index.php?view=Productos';</script>";


}


?>