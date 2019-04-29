<?PHP
class cartes{

	private $num;
	private $nom_titulaire;
	private $num_carte;
	private $year;
	private $month;
	private $code;

	function __construct($nom_titulaire,$num_carte,$year,$month,$code){
		$this->nom_titulaire=$nom_titulaire;
		$this->num_carte=$num_carte;
		$this->year=$year;
		$this->month=$month;
		$this->code=$code;
	}


	function getnom_titulaire(){
		return $this->nom_titulaire;
	}
	function getnum_carte(){
		return $this->num_carte;
	}
	function getyear(){
		return $this->year;
	}
	function getmonth(){
		return $this->month;
	}
	function get_code(){
		return $this->code;
	}
	function get_num(){
		return $this->num;
	}
	function setnom_titulaire($nom_titulaire){
		$this->address1=$address1;
	}
	function setnum_carte($num_carte){
		$this->address2=$address2;
	}
	function set_year($year){
		$this->year=$year;
	}
	function set_month($month){
		$this->month=$month;
	}
	function set_code($code){
		$this->code=$code;
	}
	function set_num(){
		return $this->num;
	}
}
