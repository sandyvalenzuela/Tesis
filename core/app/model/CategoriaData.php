<?php
class CategoriaData {
	public static $tablename = "categoria";
	public function CategoriaData(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}
	public function add(){
		$sql = "insert into categoria (nombre,created_at) ";
		$sql .= "value (\"$this->nombre\",$this->created_at)";
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
// partiendo de que ya tenemos creado un objecto CategoriaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new CategoriaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
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
			$array[$cnt] = new CategoriaData();
			$array[$cnt]->id = $r['id'];
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
			$array[$cnt] = new CategoriaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>