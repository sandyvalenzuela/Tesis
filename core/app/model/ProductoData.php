<?php
class ProductoData {
	public static $tablename = "Producto";

	public function LibrosData(){
     	$this->IdProducto = "";
	    $this->NombreProducto = "";
		$this->IdCategoria = "";
	    $this->IdPresentacion = "";
		$this->Cantidad = "";
		
	}
	
	public function getUser(){ return UserData::getById($this->user_id);}
	public function getCategoria(){ return CategoriaData::getById($this->IdCategoria;}
	public function getPresentacion(){ return PresentacionData::getById($this->IdPresentacion;}
	
	public function add(){
		$sql = "insert into ".self::$tablename." (NombreProducto, IdCategoria, IdPresentacion, Cantidad,user_id) ";
		$sql .= "value (\"$this->NombreProducto\", \"$this->IdCategoria\", \"$this->IdPresentacion\",\"$this->Cantidad\", \"$this->user_id\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where IdProducto=$id";
		Executor::doit($sql);
	}


	// partiendo de que ya tenemos creado un objecto EmpleadoData previamente utilizamos el contexto

	public function update(){
	    $sql = "update ".self::$tablename." set NombreProducto=\"$this->NombreProducto\", IdCategoria=\"$this->IdCategoria\", IdPresentacion=\"$this->IdPresentacion\", Cantidad=\"$this->Cantidad\", user_id=\"$this->user_id\" where IdProducto=$this->id";
		Executor::doit($sql);
	}	
	
	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where IdProducto=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductoData());
	}
		
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where NombreProducto like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());

	}


}

?>