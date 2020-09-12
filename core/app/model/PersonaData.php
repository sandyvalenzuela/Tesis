<?php
class PersonaData {
	public static $tablename = "persona";


	public function PersonData(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add_cliente(){
		$sql = "insert into persona (nombre,apellido,direccion,email,telefono,kind,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->direccion\",\"$this->email\",\"$this->telefono\",1,$this->created_at)";
		Executor::doit($sql);
	}

	public function add_provider(){
		$sql = "insert into persona (nombre,apellido,direccion,email,telefono,kind,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->direccion\",\"$this->email\",\"$this->telefono\",2,$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto PersonData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email=\"$this->email\",direccion=\"$this->direccion\",apellido=\"$this->apellido\",telefono=\"$this->telefono\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_client(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email=\"$this->email\",direccion=\"$this->direccion\",apellido=\"$this->apellido\",telefono=\"$this->telefono\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_provider(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email=\"$this->email\",direccion=\"$this->direccion\",apellido=\"$this->apellido\",telefono=\"$this->telefono\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new PersonaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->direccion = $r['direccion'];
			$data->telefono = $r['telefono'];
			$data->email = $r['email'];
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
			$array[$cnt] = new PersonaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->username = $r['username'];
			$array[$cnt]->telefono = $r['telefono'];
			$array[$cnt]->direccion = $r['direccion'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getClientes(){
		$sql = "select * from ".self::$tablename." where kind=1 order by nombre,apellido";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->telefono = $r['telefono'];
			$array[$cnt]->direccion = $r['direccion'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getProviders(){
		$sql = "select * from ".self::$tablename." where kind=2 order by nombre,apellido";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->telefono = $r['telefono'];
			$array[$cnt]->direccion = $r['direccion'];
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
			$array[$cnt] = new PersonaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>