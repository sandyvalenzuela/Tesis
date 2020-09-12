<?php
class ProductoData {
	public static $tablename = "producto";

	public function ProductoData(){
		$this->nombre = "";
		$this->user_id = "";
		$this->presentacion = "0";
		$this->created_at = "NOW()";
	}

	public function getCategoria(){ return CategoriaData::getById($this->categoria_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,description,user_id,presentacion,categoria_id,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->descripcion\",$this->Usuario_id,\"$this->presentacion\",$this->categoria_id,NOW())";
		return Executor::doit($sql);
	}
	public function add_with_image(){
		$sql = "insert into ".self::$tablename." (image,nombre,descripcion,Usuario_id,presentacion,unit,category_id,inventary_min) ";
		$sql .= "value (\"$this->image\",\"$this->nombre\",\"$this->descripcion\",$this->Usuario_id,\"$this->presentacion\",$this->categoria_id)";
		return Executor::doit($sql);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductoData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",presentacion=\"$this->presentacion\",categoria_id=$this->categoria_id,descripcion=\"$this->descripcion\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}

	public function del_category(){
		$sql = "update ".self::$tablename." set categoria_id=NULL where id=$this->id";
		Executor::doit($sql);
	}


	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductoData());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where nombre like '%$p%' or id like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}



	public static function getAllByUserId($Usuario_id){
		$sql = "select * from ".self::$tablename." where Usuario_id=$Usuario_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}

	public static function getAllByCategoriaId($IdCategoria){
		$sql = "select * from ".self::$tablename." where IdCategoria=$IdCategoria order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}







}

?>