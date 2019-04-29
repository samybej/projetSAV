<?PHP
class Wishlist{
	private $idUser;
    private $idProd;
    private $quantity;
	function __construct($idUser,$idProd,$quantity){
		$this->idUser=$idUser;
		$this->idProd=$idProd;
		$this->quantity=$quantity;
	}
	
	function getidUser(){
		return $this->idUser;
	}
	function getidProd(){
		return $this->idProd;
	}
	function getquantity(){
		return $this->quantity;
	}

	function setidProd($idProd){
		$this->idProd=$idProd;
	}
	function setquantity($quantity){
		$this->quantity;
	}
	
}

?>