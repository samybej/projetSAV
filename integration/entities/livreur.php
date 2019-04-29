<?PHP
class Livreur{
	private $cin;
	private $nom;
	private $prenom;
	private $dispo;

	function __construct($cin,$nom,$prenom,$dispo=1){
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->dispo=$dispo;
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getDispo(){
		return $this->dispo;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}

	
}

?>