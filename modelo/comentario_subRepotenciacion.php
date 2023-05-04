<?php 
	require_once 'conexionBD.php';
	/**
	*/
	class comentario_subRepotenciacion{
		private $id;
		private $id_repotenciacion;
		private $avances;
		private $fecha_avance;
		private $id_Subrepotenciacion;
		private $estatus;
		function __construct(){
			$this->con= new conexionBD();
			$this->con->setA("comentario_subRepotenciacion");
			$this->con->setB("id,id_Subrepotenciacion,id_repotenciacion,avances,fecha_avance,estatus");
		}
		public function setId(){
			$this->con->setB("id");
			$this->id=$this->con->contar()+1;
		}
		public function getId(){
			return $this->id;
		}
		public function setId2($id){
			$this->id=$id;
		}
		public function getEstatus(){
			return $this->estatus;
		}
		public function setEstatus($estatus){
			$this->estatus=$estatus;
		}
		public function setid_Subrepotenciacion($id_Subrepotenciacion){
			$this->id_Subrepotenciacion=$id_Subrepotenciacion;
		}
		public function getid_Subrepotenciacion(){
			return $this->id_Subrepotenciacion;
		}
		public function setid_repotenciacion($id_repotenciacion){
			$this->id_repotenciacion=$id_repotenciacion;
		}
		public function getid_repotenciacion(){
			return $this->id_repotenciacion;
		}
		public function setAvances($avances){
			$this->avances=$avances;
		}
		public function getAvances(){
			return $this->avances;
		}
		public function setFecha_avance($fecha_avance){
			$this->fecha_avance=$fecha_avance;
		}
		public function getFecha_avance(){
			return $this->fecha_avance;
		}
		public function registrar(){
			$this->con->setB("id,id_Subrepotenciacion,id_repotenciacion,avances,fecha_avance,estatus");
			$this->con->setC("$this->id,'$this->id_Subrepotenciacion','$this->id_repotenciacion','$this->avances','$this->fecha_avance','$this->estatus'");
			$resultado=$this->con->registra();
			if(!$resultado){
				return false;
			}
			else{
				return true;
			}
		}
		public function consultar(){
			$sql= "SELECT id,id_Subrepotenciacion,avances,fecha_avance
					FROM comentario_subRepotenciacion
					WHERE estatus=1 and id_Subrepotenciacion='".$this->id_Subrepotenciacion."' order by id desc";
			$lista=$this->con->actualizar($sql);
			if(empty($lista)==true){
				return false;
			}else{
				$arrayReturn = array();
				while($datos=pg_fetch_assoc($lista)){
					$arrayReturn[]=$datos;
				}
				return $arrayReturn;
			}
		}
		public function cant_comentario($id){
			$sql= "SELECT COUNT(id) as id
					FROM comentario_subRepotenciacion
					WHERE estatus=1 and id_Subrepotenciacion='".$id."'";
			$lista=$this->con->actualizar($sql);
			if(empty($lista)==true){
				return false;
			}else{
				while($datos=pg_fetch_assoc($lista)){
					return $datos['id'];
				}
			}
		}
		
	}
?>