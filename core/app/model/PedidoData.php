<?php
class PedidoData {
	public static $tablename = "pedido";
	public function PedidoData(){
		$this->created_at = "NOW()";
	}
	public function getPersona(){ return PersonaData::getById($this->persona_id);}
	public function getUsuario(){ return UsuarioData::getById($this->Usuario_id);}
	public function getClinica(){ return ClinicaData::getById($this->Clinica_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (Usuario_id,created_at) ";
		$sql .= "value ($this->Usuario_id,$this->created_at)";
		return Executor::doit($sql);
	}


	
	public function add_re(){
		$sql = "insert into ".self::$tablename." (Usuario_id,Operacion_tipo_id,created_at) ";
		$sql .= "value ($this->Usuario_id,1,$this->created_at)";
		return Executor::doit($sql);
	}
	public function add_with_Personal(){
		$sql = "insert into ".self::$tablename." (Persona_id,Usuario_id,created_at) ";
		$sql .= "value ($this->Persona_id,$this->Usuario_id,$this->created_at)";
		return Executor::doit($sql);
	}
	public function add_with_Clinica(){
		$sql = "insert into ".self::$tablename." (Clinica_id,Usuario_id,created_at) ";
		$sql .= "value ($this->Clinica_id,$this->Usuario_id,$this->created_at)";
		return Executor::doit($sql);
	}
	public function add_re_with_Personal(){
		$sql = "insert into ".self::$tablename." (Persona_id,Operacion_tipo_id,Usuario_id,created_at) ";
		$sql .= "value ($this->Persona_id,1,$this->Usuario_id,$this->created_at)";
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
	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PedidoData());
	}

	public static function getPedidos(){
		$sql = "select * from ".self::$tablename." where operacion_tipo_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PedidoData());
	}



	
	public static function getAllByDateOp($start,$end,$op){
  $sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and Operation_tipo_id=$op order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PedidoData());

	}
	public static function getAllByDateBCOp($Clinica_id,$start,$end,$op){
 $sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and Clinica_id=$Clinica_id  and Operacion_tipo_id=$op order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PedidoData());

	}

}

?>