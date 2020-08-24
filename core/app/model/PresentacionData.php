<?php
class PresentacionData {
	public static $tablename = "Presentacion";


	public function PresentacionData(){
		$this->nombrePresentacion = "";
	
	}

	public function add(){
		$sql = "insert into Presentacion  (nombrePresentacion) ";
		$sql .= "value (\"$this->nombrePresentacion\")";
		Executor::doit($sql);
	}
	
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where IdPresentacion=$Id";
		Executor::doit($sql);
	}
	

	public function update(){
		$sql = "update ".self::$tablename." set nombrePresentacion=\"$this->nombrePresentacion\" where IdPresentacion=$this->Id";
		Executor::doit($sql);
	}


	


	public static function getAll(){
		$sql = "select * from ".self::$tablename. " order by nombrePresentacion asc ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PresentacionData();
			$array[$cnt]->IdPresentacion = $r['IdPresentacion'];
			$array[$cnt]->nombrePresentacion = $r['nombrePresentacion'];
			$cnt++;
		}
		return $array;
	}
	
		

	

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombrePresentacion like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PresentacionData();
			$array[$cnt]->IdPresentacion = $r['IdPresentacion'];
			$array[$cnt]->nombre = $r['nombrePresentacion'];
			$cnt++;
		}
		return $array;
	}
}

?>