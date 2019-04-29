<?PHP
class Remise{
	private $id_remise;
	private $id_event;
	private $pourcentage;
	private $num_p;
	
	function __construct($id_remise,$id_event,$pourcentage,$num_p){
		$this->id_remise=$id_remise;
		$this->id_event=$id_event;
		$this->pourcentage=$pourcentage;
		$this->num_p=$num_p;
		
	}
	
	function getId_remise(){
		return $this->id_remise;
	}
	function getId_event(){
		return $this->id_event;
	}
	function getPourcentage(){
		return $this->pourcentage;
	}
	function getNum_p(){
		return $this->num_p;
	}
	

	function setId_event($id_event){
		$this->id_event=$id_event;
	}
	function setPourcentage($pourcentage){
		$this->pourcentage;
	}
	function setNum_p($num_p){
		$this->num_p=$num_p;
	}
	
	
}

?>