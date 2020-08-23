<?php
class LibrosData {
	public static $tablename = "libros";

	public function LibrosData(){
     	$this->id = "";
	    $this->nombre = "";
		$this->autor_id = "";
	    $this->user_id = "";
		$this->anio_edicion = "";
		
	}
	
	public function getUser(){ return UserData::getById($this->user_id);}
    public function getAutor(){ return AutorData::getById($this->autor_id);}
	
	public function add(){
		$sql = "insert into ".self::$tablename." (nombre, autor_id, user_id, anio_edicion) ";
		$sql .= "value (\"$this->nombre\", \"$this->autor_id\", \"$this->user_id\",\"$this->anio_edicion\")";
		//print_r($sql);
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}


	
	public function update(){
	    $sql = "update ".self::$tablename." set nombre=\"$this->nombre\", autor_id=\"$this->autor_id\", user_id=\"$this->user_id\", anio_edicion=\"$this->anio_edicion\" where id=$this->id";
		//print_r($sql);
		Executor::doit($sql);
	}	
	
		

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LibrosData());
	}
	
		

	public static function getAllByDate($start,$end){
  $sql = "select * from ".self::$tablename." where date(anio_edicion) >= \"$start\" and date(anio_edicion) <= \"$end\"  order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibrosData());

	}
	
	public static function getidMax(){
		$sql = "select 	MAX(id) AS maxid from ".self::$tablename;
		$query = Executor::doit($sql);
		$found = null;
		$data = new LibrosData();
		
		while($r = $query[0]->fetch_array()){
			$data->id = $r['maxid'];
			$found = $data;
			break;
		}
		return $found;
	}	
	
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibrosData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibrosData());

	}


}

?>