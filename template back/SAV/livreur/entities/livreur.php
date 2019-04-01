<?PHP
class Livreur{
	private $cin;
	private $nom;
	private $prenom;
	private $destination;
	private $dispo;
	private $date_livraison;

	function __construct($cin,$nom,$prenom,$destination,$dispo,$date_livraison){
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->destination=$destination;
		$this->dispo=$dispo;
		$this->date_livraison=$date_livraison;
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
	function getDestination(){
		return $this->destination;
	}
	function getDispo(){
		return $this->dispo;
	}
	function getDateLivraison(){
		return $this->date_livraison;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setDestination($destination){
		$this->destination=$destination;
	}
	function setDispo($dispo){
		$this->dispo=$dispo;
	}
	function setDateLivraison($date_livraison){
		$this->date_livraison=$date_livraison;
	}
	
}

?>