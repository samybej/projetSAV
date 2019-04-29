<?PHP
class Event{
	private $id;
	private $nom;
	private $dateE;
	private $duree;
	
	function __construct($id,$nom,$dateE,$duree){
		$this->id=$id;
		$this->nom=$nom;
		$this->dateE=$dateE;
		$this->duree=$duree;
		
	}
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getDate(){
		return $this->dateE;
	}
	function getDuree(){
		return $this->duree;
	}
	

	function setNom($nom){
		$this->nom=$nom;
	}
	function setDate($dateE){
		$this->dateE;
	}
	function setDuree($duree){
		$this->duree=$duree;
	}
	
	
}

?>