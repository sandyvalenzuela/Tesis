<?php
class nacionalidadData {
	public static $tablename = "nacionalidad";


	public function nacionalidadData(){
		$this->nacionalidad = "";
	}

	public function add(){
		$sql = "insert into nacionalidad  (nacionalidad) ";
		$sql .= "value (\"$this->nacionalidad\")";
		Executor::doit($sql);
	}
	
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	

	public function update($id){
		$sql = "update ".self::$tablename." set nacionalidad=\"$this->nacionalidad\" where id=$id";
		Executor::doit($sql);
	}


	public static function getById($id){
	    
		$sql = "select * from ".self::$tablename." where id=$id";
		//print_r($sql);
		$query = Executor::doit($sql);
		$found = null;
		$data = new nacionalidadData();
		while($r = $query[0]->fetch_array()){
		$data->id = $r['id'];
			
			$data->nacionalidad = $r['nacionalidad'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename. " order by nacionalidad asc ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new nacionalidadData();
			$array[$cnt]->id = $r['id'];	
			$array[$cnt]->nacionalidad = $r['nacionalidad'];
			$cnt++;
		}
		return $array;
	}

	

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nacionalidad like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new nacionalidadData();
			$array[$cnt]->id = $r['id'];	
			$array[$cnt]->nacionalidad = $r['nacionalidad'];
			$cnt++;
		}
		return $array;
	}
}

?>