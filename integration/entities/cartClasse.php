<?PHP
class Cart{
	private $id_cart;
    private $id_user;
    private $id_prod;
    private $quantite;
	function __construct($id_cart,$id_user,$id_prod,$quantite){
		$this->id_cart=$id_cart;
		$this->id_user=$id_user;
        $this->id_prod=$id_prod;
        $this->quantite=$quantite;
	}
	
	function getid_cart(){
		return $this->id_cart;
	}
	function getid_user(){
		return $this->id_user;
	}
	function getid_prod(){
		return $this->id_prod;
    }
    function getquantite(){
        return $this->quantite;
    }

	function setid_user($id_user){
		$this->id_user=$id_user;
	}
	function setid_prod($id_prod){
		$this->id_prod=$id_prod;
    }
    function setquantite($quantite){
		$this->quantite=$quantite;
	}
	
}

?>