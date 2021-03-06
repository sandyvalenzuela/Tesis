<?php
class UsuarioData {
	public static $tablename = "Usuario";



	public function Usuariodata(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into Usuario (nombre,apellido,username,email,is_admin,password,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->username\",\"$this->email\",\"$this->is_admin\",\"$this->password\",$this->created_at)";
		Executor::doit($sql);
	}
	public function add_with_image(){
		$sql = "insert into ".self::$tablename." (image,nombre,apellido,username,email,password) ";
		$sql .= "value (\"$this->image\",\"$this->nombre\",\"$this->apellido\",$this->username,\"$this->email\",$this->password)";
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

// partiendo de que ya tenemos creado un objecto UsuarioData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email=\"$this->email\",username=\"$this->username\",apellido=\"$this->apellido\",is_active=\"$this->is_active\",is_admin=\"$this->is_admin\" where id=$this->id";
		Executor::doit($sql);
	}
	public function update_Clinica(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email=\"$this->email\",username=\"$this->username\",apellido=\"$this->apellido\",is_active=\"$this->is_active\",is_admin=\"$this->is_admin\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());

	}
	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());

	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());

	}


}

?>