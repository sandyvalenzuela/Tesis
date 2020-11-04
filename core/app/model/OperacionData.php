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
		$sql = "insert into ".self::$tablename." (Producto_id,q,dinero,operacion_tipo_id,pedido_id,created_at) ";
		$sql .= "value (\"$this->Producto_id\",$this->q\",$this->dinero\",$this->operacion_tipo_id,$this->Pedido_id,$this->created_at)";
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

	public static function getAllByDateOfficialBP($Producto, $start,$end){
 $sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and Producto_id=$Producto order by created_at desc";
		if($start == $end){
		 $sql = "select * from ".self::$tablename." where date(created_at) = \"$start\" order by created_at desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public function getProducto(){ return ProductoData::getById($this->Producto_id);}
	public function getOperaciontipo(){ return OperacionTipoData::getById($this->operacion_tipo_id);}





	public static function getQYesF($Producto_id){
		$q=0;
		$Operaciones = self::getAllByProductoId($Producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($Operaciones as $Operacion){
				if($Operacion->Operacion_tipo_id==$input_id){ $q+=$Operacion->q; }
				else if($Operacion->Operacion_tipo_id==$output_id){  $q+=(-$Operacion->q); }
		}
		// print_r($data);
		return $q;
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


	public static function getAllProductosByPedidoId($Pedido_id){
		$sql = "select * from ".self::$tablename." where Pedido_id=$Pedido_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}


	public static function getAllByProductoIdCutIdYesF($producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$producto_id and cut_id=$cut_id order by created_at desc";
		return Model::many($query[0],new OperacionData());
		return $array;
	}

////////////////////////////////////////////////////////////////////
	public static function getOutputQ($Producto_id,$cut_id){
		$q=0;
		$Operaciones = self::getOutputByProductoIdCutId($Producto_id,$cut_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($Operaciones as $Operacion){
			if($Operacion->Operacion_tipo_id==$input_id){ $q+=$Operacion->q; }
			else if($Operacion->Operacion_tipo_id==$output_id){  $q+=(-$Operacion->q); }
		}
		// print_r($data);
		return $q;
	}

	public static function getOutputQYesF($Producto_id){
		$q=0;
		$Operaciones = self::getOutputByProductId($Producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($Operaciones as $Operacion){
			if($Operacion->Operacion_tipo_id==$input_id){ $q+=$Operacion->q; }
			else if($operacion->operacion_tipo_id==$output_id){  $q+=(-$Operacion->q); }
		}
		// print_r($data);
		return $q;
	}

	public static function getInputQYesF($Producto_id){
		$q=0;
		$Operaciones = self::getInputByProductoId($Producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		foreach($Operaciones as $Operacion){
			if($Operacion->Operacion_tipo_id==$input_id){ $q+=$Operacion->q; }
		}
		// print_r($data);
		return $q;
	}



	public static function getOutputByProductoIdCutId($Producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id and cut_id=$cut_id and Operacion_tipo_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}


	public static function getOutputByProductoId($Producto_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id and Operacion_tipo_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

////////////////////////////////////////////////////////////////////
	public static function getInputQ($producto_id,$cut_id){
		$q=0;
		return Model::many($query[0],new OperacionData());
		$Operaciones = self::getInputByProductoId($producto_id);
		$input_id = OperacionTipoData::getByName("entrada")->id;
		$output_id = OperacionTipoData::getByName("salida")->id;
		foreach($Operaciones as $Operacion){
			if($Operacion->Operacion_tipo_id==$input_id){ $q+=$Operacion->q; }
			else if($Operacion->Operacion_tipo_id==$output_id){  $q+=(-$Operacion->q); }
		}
		// print_r($data);
		return $q;
	}


	public static function getInputByProductoIdCutId($Producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id and cut_id=$cut_id and Operacion_tipo_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getInputByProductoId($Producto_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id and Operacion_tipo_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getInputByProductoIdCutIdYesF($Producto_id,$cut_id){
		$sql = "select * from ".self::$tablename." where Producto_id=$Producto_id and cut_id=$cut_id and Operacion_tipo_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}




}

?>