<?php
class OperacionData {
	public static $tablename = "operacion";

	public function OperacionData(){
		$this->nombre = "";
		$this->producto_id = "";
		$this->q = "";
		$this->dinero = "";
		$this->operacion_tipo_id = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (producto_id,q,operacion_tipo_id,pedido_id,created_at) ";
		$sql .= "value (\"$this->producto_id\",$this->q\",$this->operacion_tipo_id,$this->pedido_id,$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto OperacionData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set producto_id=\"$this->producto_id\,q=\"$this->q\", where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperacionData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());

	}



	public static function getAllByDateOfficial($start,$end){
 $sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" order by created_at desc";
		if($start == $end){
		 $sql = "select * from ".self::$tablename." where date(created_at) = \"$start\" order by created_at desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getAllByDateOfficialBP($producto, $start,$end){
 $sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and producto_id=$producto order by created_at desc";
		if($start == $end){
		 $sql = "select * from ".self::$tablename." where date(created_at) = \"$start\" order by created_at desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public function getProducto(){ return ProductoData::getById($this->Producto_id);}
	public function getOperaciontipo(){ return OperacionTipoData::getById($this->operaciontipo_id);}





	public static function getQYesF($Producto_id){
		$dinero=0;
		$operaciones = self::getAllByProductoId($Producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($operaciones as $operacion){
				if($operacion->operacion_tipo_id==$input_id){ $dinero+=$operacion->dinero; }
				else if($Operacion->operacion_tipo_id==$output_id){  $dinero+=(-$operacion->dinero); }
		}
		// print_r($data);
		return $dinero;
	}



	public static function getAllByProductoIdCutId($Producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id and cut_id=$cut_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}
///Historial
	public static function getAllByProductoId($Producto_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id  order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}


	public static function getAllByProductoIdCutIdOficial($producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where producto_id=$producto_id and cut_id=$cut_id order by created_at desc";
		return Model::many($query[0],new OperacionData());
	}


	public static function getAllProductosBySellId($pedido_id){
		$sql = "select * from ".self::$tablename." where pedido_id=$pedido_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}


	public static function getAllByProductoIdCutIdYesF($producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$producto_id and cut_id=$cut_id order by created_at desc";
		return Model::many($query[0],new OperacionData());
		return $array;
	}

////////////////////////////////////////////////////////////////////
	public static function getOutputQ($producto_id,$cut_id){
		$dinero=0;
		$operaciones = self::getOutputByProductoIdCutId($producto_id,$cut_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($operaciones as $operacion){
			if($operacion->operaciontipo_id==$input_id){ $dinero+=$operacion->dinero; }
			else if($operacion->operaciontipo_id==$output_id){  $dinero+=(-$operacion->dinero); }
		}
		// print_r($data);
		return $dinero;
	}

	public static function getOutputQYesF($producto_id){
		$dinero=0;
		$operaciones = self::getOutputByProductId($producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($operaciones as $operacion){
			if($operacion->operaciontipo_id==$input_id){ $dinero+=$operacion->dinero; }
			else if($operacion->operaciontipo_id==$output_id){  $dinero+=(-$operacion->dinero); }
		}
		// print_r($data);
		return $dinero;
	}

	public static function getInputQYesF($Producto_id){
		$dinero=0;
		$operaciones = self::getInputByProductoId($Producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		foreach($operaciones as $operacion){
			if($operacion->operaciontipo_id==$input_id){ $dinero+=$operacion->dinero; }
		}
		// print_r($data);
		return $dinero;
	}



	public static function getOutputByProductoIdCutId($producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where producto_id=$product_id and cut_id=$cut_id and operaciontipo_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}


	public static function getOutputByProductoId($producto_id){
		$sql = "select * from ".self::$tablename." where producto_id=$producto_id and operacion_tipo_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

////////////////////////////////////////////////////////////////////
	public static function getInputQ($producto_id,$cut_id){
		$q=0;
		return Model::many($query[0],new OperacionData());
		$operaciones = self::getInputByProductoId($producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($operaciones as $operacion){
			if($operacion->operaciontipo_id==$input_id){ $dinero+=$operacion->dinero; }
			else if($operacion->operaciontipo_id==$output_id){  $dinero+=(-$operacion->dinero); }
		}
		// print_r($data);
		return $q;
	}


	public static function getInputByProductoIdCutId($producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where producto_id=$producto_id and cut_id=$cut_id and operaciontipo_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getInputByProductoId($producto_id){
		$sql = "select * from ".self::$tablename." where producto_id=$producto_id and operaciontipo_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getInputByProductoIdCutIdYesF($producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where producto_id=$producto_id and cut_id=$cut_id and operaciontipo_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}




}

?>