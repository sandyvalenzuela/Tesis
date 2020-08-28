<?php
class UserData {
	public static $tablename = "Usuario";



	public function Userdata(){
		$this->NombreUsuario = "";
		$this->ApellidoUsuario = "";
		$this->email = "";
		$this->Image = "";
		$this->Password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into user (NombreUsuario,ApellidoUsuario,Usuario,email,is_admin,Password,created_at) ";
		$sql .= "value (\"$this->NombreUsuario\",\"$this->ApellidoUsuario\",\"$this->Usuario\",\"$this->email\",\"$this->is_admin\",\"$this->Password\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where IdUsuario=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where idUsuario=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set NombreUsuario=\"$this->NombreUsuario\",email=\"$this->email\",Usuario=\"$this->Usuario\",ApellidoUsuario=\"$this->ApellidoUsuario\",is_active=\"$this->is_active\",is_admin=\"$this->is_admin\" where IdUsuario=$this->IdUsuario";
		Executor::doit($sql);
	}

	public function update_password(){
		$sql = "update ".self::$tablename." set Password=\"$this->Password\" where IdUsuario=$this->IdUsuario";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where IdUsuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}


}

?>