<?php 
	require_once 'conexionBD.php';
	/**
	*/
	class sub_repotenciacion{
		private $id;
		private $id_repotenciacion;
		private $avances;
		private $fecha_avance;
		private $estado;
		private $estatus;
		private $usuario;
		function __construct(){
			$this->con= new conexionBD();
			$this->con->setA("sub_repotenciacion");
			$this->con->setB("id,id_repotenciacion,avances,fecha_avance,estado,estatus,usuario");
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
		public function setEstado($estado){
			$this->estado=$estado;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstatus($estatus){
			$this->estatus=$estatus;
		}
		public function getEstatus(){
			return $this->estatus;
		}
		public function setUsuario($usuario){
			$this->usuario=$usuario;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setFecha_avance($fecha_avance){
			$this->fecha_avance=$fecha_avance;
		}
		public function getFecha_avance(){
			return $this->fecha_avance;
		}
		public function registrar(){
			$this->con->setB("id,id_repotenciacion,avances,fecha_avance,estado,estatus,usuario");
			$this->con->setC("$this->id,'$this->id_repotenciacion','$this->avances','$this->fecha_avance','$this->estado','1','$this->usuario'");
			$resultado=$this->con->registra();
			if(!$resultado){
				return false;
			}
			else{
				return true;
			}
		}
		public function consultar(){
			$sql= "SELECT id,id_repotenciacion,avances,fecha_avance,usuario,estatus
					FROM sub_repotenciacion
					WHERE estado=1 and id_repotenciacion='".$this->id_repotenciacion."' order by id desc";  

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
		public function consultar2(){
			$sql= "SELECT id,id_repotenciacion,avances,fecha_avance,estado,estatus,usuario
					FROM sub_repotenciacion
					WHERE id_repotenciacion='".$this->id_repotenciacion."' and id=".$this->id."";
			$lista=$this->con->actualizar($sql);
			if(empty($lista)==true){
				return false;
			}else{
				while($datos=pg_fetch_assoc($lista)){
					$this->id=$datos['id'];
					$this->id_repotenciacion=$datos['id_repotenciacion'];
					$this->avances=$datos['avances'];
					$this->fecha_avance=$datos['fecha_avance'];
					$this->estado=$datos['estado'];
					$this->usuario=$datos['usuario'];
				}
			}
		}
		public function actualizar($a,$b){
			$sql= "UPDATE sub_repotenciacion SET ".$a."='$b'
			WHERE id='".$this->id."'";
			$resultado=$this->con->actualizar($sql);
			if(!$resultado){
				return false;
			}
			else{
				return true;
			}
		}

		public function actualizar2($repo,$sub_repo,$opc){
           
			$sql= "UPDATE sub_repotenciacion SET estatus=".$opc."
                  WHERE id=".$sub_repo." AND id_repotenciacion=".$repo."";

			$resultado=$this->con->actualizar($sql);
			if(!$resultado){
				return false;
			}
			else{
				return true;
			}
		}
		
	}
?>