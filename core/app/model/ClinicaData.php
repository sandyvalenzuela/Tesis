<?php
class ClinicaData {
	public static $tablename = "clinica";
	public function ClinicaData(){
		$this->codigo = "";
		$this->nombre = "";
		$this->created_at = "NOW()";
	}
	public function add_Clinica(){
		$sql = "insert into clinica (codigo,nombre,kind,created_at) ";
		$sql .= "value (\"$this->codigo\",\"$this->nombre\",1,$this->created_at)";
		Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}
// partiendo de que ya tenemos creado un objecto ClinicaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->codigo\",\"$this->nombre\" where id=$this->id";
		Executor::doit($sql);
	}
	public function update_Clinica(){
		$sql = "update ".self::$tablename." set codigo\"$this->codigo\",nombre=\"$this->nombre\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ClinicaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->codigo = $r['codigo'];
			$data->nombre = $r['nombre'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClinicaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->codigo = $r['codigo'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
	public static function getClinicas(){
		$sql = "select * from ".self::$tablename." where kind=1 order by nombre";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClinicaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->codigo = $r['codigo'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}



	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClinicaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->codigo = $r['codigo'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>