<?php
class AutorData {
	public static $tablename = "autor";


	public function AutorData(){
		$this->nombre = "";
		$this->apellido = "";
		$this->nacionalidad = "";
		$this->fecha = "NOW()";
	}

	public function getNacionalidad(){ return nacionalidadData::getById($this->nacionalidad);}
	public function add(){
		$sql = "insert into autor  (nombre,apellido,nacionalidad, fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->nacionalidad\",$this->fecha)";
		Executor::doit($sql);
	}
	
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",apellido=\"$this->apellido\",nacionalidad=\"$this->nacionalidad\",  fecha=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
	    
		$sql = "select * from ".self::$tablename." where id=$id";
		//print_r($sql);
		$query = Executor::doit($sql);
		$found = null;
		$data = new AutorData();
		while($r = $query[0]->fetch_array()){
		$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->nacionalidad = $r['nacionalidad'];
			$data->fecha = $r['fecha'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename. " order by nombre asc ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AutorData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->nacionalidad = $r['nacionalidad'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}
	
		public static function getAllGuatemala(){
		$sql = "select a.* from ".self::$tablename. " as a, nacionalidad as b  where b.nacionalidad = 'Guatemalteco' and a.nacionalidad = b.id order by a.nombre asc ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AutorData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->nacionalidad = $r['nacionalidad'];
			$array[$cnt]->fecha = $r['fecha'];
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
			$array[$cnt] = new AutorData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->nacionalidad = $r['nacionalidad'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}
}

?>