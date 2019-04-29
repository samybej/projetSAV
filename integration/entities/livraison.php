<?PHP
class Livraison{
	private $num_c;
	private $cin;
	private $address1;
	private $address2;
	private $ville;
	private $zip;
	private $id_client;

	function __construct($num_c,$cin=NULL,$address1,$address2=NULL,$ville,$zip,$id_client){
		$this->num_c=$num_c;
		$this->cin=$cin;
		$this->address1=$address1;
		$this->address2=$address2;
		$this->ville=$ville;
		$this->zip=$zip;
		$this->id_client=$id_client;
	}
	
	function getNum_c(){
		return $this->num_c;
	}
	function getCin(){
		return $this->cin;
	}
	function getAddress1(){
		return $this->address1;
	}
	function getAddress2(){
		return $this->address2;
	}
	function getVille(){
		return $this->ville;
	}
	function getZip(){
		return $this->zip;
	}
	function getIdClient(){
		return $this->id_client;
	}
}

?>