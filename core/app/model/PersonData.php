<?php
class PersonData {
	public static $tablename = "person";


	public function PersonData(){
		$this->name = "";
		$this->lastname = "";
		$this->email1 = "";
		$this->phone1 = "";
		$this->phone2 = "";
		$this->address1 = "";
		$this->company = "";
		$this->kind = "";
		$this->sueldo = "";
		$this->licencia = "";
		$this->dpi = "";
		$this->nit = "";
		$this->created_at = "NOW()";
	}

	public function add_provider(){
		$sql = "insert into person (name,lastname,address1,company, email1,phone1,phone2, nit, kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->company\" , \"$this->email1\",\"$this->phone1\", \"$this->phone2\", \"$this->nit\" ,2,$this->created_at)";
		Executor::doit($sql);
	}

	public function add_client(){
		$sql = "insert into person (name,lastname,address1,company, email1,phone1,phone2, nit, kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->company\" , \"$this->email1\",\"$this->phone1\", \"$this->phone2\", \"$this->nit\" ,1,$this->created_at)";
		Executor::doit($sql);
	}
	
	
		public function add_piloto(){
        $sql = "insert into person (name,lastname,address1,licencia,DPI, email1,phone1,phone2, kind, sueldo, created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->licencia\", \"$this->dpi\", \"$this->email1\",\"$this->phone1\", \"$this->phone2\",3,\"$this->sueldo\",$this->created_at)";
			Executor::doit($sql);
	}
	
		public function add_propietario(){
        $sql = "insert into person (name,lastname,address1,licencia,DPI, email1,phone1,phone2, kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->licencia\", \"$this->dpi\", \"$this->email1\",\"$this->phone1\", \"$this->phone2\",4,$this->created_at)";
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
		$sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_client(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\",phone2=\"$this->phone2\",company=\"$this->company\",NIT=\"$this->nit\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_provider(){
	$sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\",phone2=\"$this->phone2\",company=\"$this->company\",NIT=\"$this->nit\" where id=$this->id";
		Executor::doit($sql);
	}
	

	
	public function update_piloto(){
        $sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\",phone2=\"$this->phone2\",licencia=\"$this->licencia\",DPI =\"$this->dpi\", sueldo =\"$this->sueldo\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_propietario(){
        $sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\",phone2=\"$this->phone2\", company=\"$this->company\", NIT=\"$this->nit\",DPI =\"$this->dpi\" where id=$this->id";
		Executor::doit($sql);
	}
	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
	    
		$sql = "select * from ".self::$tablename." where id=$id";
		//print_r($sql);
		$query = Executor::doit($sql);
		$found = null;
		$data = new PersonData();
		while($r = $query[0]->fetch_array()){
		$data->id = $r['id'];
			$data->name = $r['name'];
			$data->lastname = $r['lastname'];
			$data->address1 = $r['address1'];
			$data->company = $r['company'];
			$data->nit = $r['NIT'];
			$data->kind = $r['kind'];
			$data->phone1 = $r['phone1'];
		    $data->phone2 = $r['phone2'];
			$data->email1 = $r['email1'];
			$data->created_at = $r['created_at'];
			$data->sueldo = $r['sueldo'];
			$found = $data;
			break;
		}
		return $found;
	}

	
	public static function getByIdPiloto($id){
	    
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new PersonData();
		while($r = $query[0]->fetch_array()){
		$data->id = $r['id'];
			$data->name = $r['name'];
			$data->lastname = $r['lastname'];
			$data->address1 = $r['address1'];
			$data->nit = $r['NIT'];
			$data->dpi = $r['DPI'];
			$data->licencia = $r['licencia'];
			$data->phone1 = $r['phone1'];
		    $data->phone2 = $r['phone2'];
			$data->email1 = $r['email1'];
			$data->created_at = $r['created_at'];
			$data->sueldo = $r['sueldo'];
			$found = $data;
			break;
		}
		return $found;
	}
	
	
	public static function getByIds($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new PersonData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->lastname = $r['lastname'];
			$data->address1 = $r['address1'];
			$data->company = $r['company'];
			$data->nit = $r['NIT'];
			$data->phone1 = $r['phone1'];
		    $data->phone2 = $r['phone2'];
			$data->email1 = $r['email1'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}

		public static function getAllPP(){
		$sql = "select * from ".self::$tablename." order by name asc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename. " order by kind||name asc ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	
	public static function getClientsI(){
		$sql = "select * from ".self::$tablename." where kind=3 order by name";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->company = $r['company'];
			$array[$cnt]->kind = $r['kind'];
			$array[$cnt]->nit = $r['NIT'];
			$array[$cnt]->created_at = $r['created_at'];
			
			
			$cnt++;
		}
		return $array;
	}
	
	
		public static function getClients(){
		$sql = "select * from ".self::$tablename." where kind=1 order by name";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->company = $r['company'];
			$array[$cnt]->kind = $r['kind'];
			$array[$cnt]->nit = $r['NIT'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getProviders(){
		$sql = "select * from ".self::$tablename." where kind=2 order by name";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->company = $r['company'];
			$array[$cnt]->kind = $r['kind'];
			$array[$cnt]->nit = $r['NIT'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
	
	public static function getPiloto(){
		$sql = "select * from ".self::$tablename." where kind=3 order by name";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->licencia = $r['licencia'];
			$array[$cnt]->dpi = $r['DPI'];
			$array[$cnt]->sueldo = $r['sueldo'];
			$array[$cnt]->kind = $r['kind'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
	
	
	public static function getPilotoProve(){
		$sql = "select * from ".self::$tablename." where kind in (3,2) order by name";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->licencia = $r['licencia'];
			$array[$cnt]->dpi = $r['DPI'];
			$array[$cnt]->sueldo = $r['sueldo'];
			$array[$cnt]->kind = $r['kind'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
	
	public static function getPropietario(){
		$sql = "select * from ".self::$tablename." where kind=4 order by name";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->licencia = $r['licencia'];
			$array[$cnt]->dpi = $r['DPI'];
			$array[$cnt]->kind = $r['kind'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PersonData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
	
		public static function getAllPiloto(){
		$sql = "select * from ".self::$tablename." where  kind=3 order by name asc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}


}

?>