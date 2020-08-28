<?php
class CategoriaData {
	public static $tablename = "Categoria";


	public function CategoriaData(){
		$this->nombreCategoria	= "";
	
	}

	public function add(){
		$sql = "insert into Categoria  (nombreCategoria) ";
		$sql .= "value (\"$this->nombreCategoria\")";
		Executor::doit($sql);
	}
	
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where IdCategoria=$Id";
		Executor::doit($sql);
	}
	

	public function update(){
		$sql = "update ".self::$tablename." set nombreCategoria=\"$this->nombreCategoria\" where IdCategoria=$this->Id";
		Executor::doit($sql);
	}


	
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where IdCategoria=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new CategoriaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['idCategoria'];
			$data->nombreCategoria = $r['nombreCategoria'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename. " order by nombreCategoria asc ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CategoriaData();
			$array[$cnt]->IdCategoria = $r['IdCategoria'];	
			$array[$cnt]->nombreCategoria = $r['nombreCategoria'];
			$cnt++;
		}
		return $array;
	}
		

	

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombreCategoria like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CategoriaData();
			$array[$cnt]->IdCategoria = $r['IdCategoria'];
			$array[$cnt]->nombre = $r['nombreCategoria'];
			$cnt++;
		}
		return $array;
	}
}

?>