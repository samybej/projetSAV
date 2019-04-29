<?PHP
class Reclamation{
	private $num_r;
	private $num_c;
	private $id_client;
	private $reclame;

	
	function __construct($num_c,$id_client,$reclame=NULL){
		#$this->num_r=$num_r;
		$this->num_c=$num_c;
		$this->id_client=$id_client;
		$this->reclame=$reclame;
	}
	
	function getNum_r(){
		return $this->num_r;
	}
	function getNum_c(){
		return $this->num_c;
	}
	function getId_client(){
		return $this->id_client;
	}
	function getReclame(){
		return $this->reclame;
	}

	function setNum_c($num_c){
		$this->num_c;
	}
	function setId_client($id_client){
		$this->id_client=$id_client;
	}
	function setReclame($reclame){
		$this->reclame=$reclame;
	}
	
}

?>