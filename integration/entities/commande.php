<?PHP
class commande{

	private $address1; 
	private $address2;
	private $ville;
    private $zip;
    private $phone;
    private $type_livraison;
    private $id_commande;
    private $mode_payement;
	function __construct($address1,$address2,$ville,$zip,$phone,$type_livraison,$mode_payement){
		$this->address1=$address1;
		$this->address2=$address2;
		$this->ville=$ville;
		$this->zip=$zip;
		$this->phone=$phone;
		$this->type_livraison=$type_livraison;
		$this->mode_payement=$mode_payement;
	}


	function get_address1(){
		return $this->address1;
	}
	function get_address2(){
		return $this->address2;
	}
	function get_ville(){
		return $this->ville;
	}
	function get_zip(){
		return $this->zip;
	}
	function get_phone(){
		return $this->phone;
	}
	function get_type(){
		return $this->type_livraison;
	}
	function get_id(){
		return $this->id_commande;
	}
	function get_mode_payement(){
		return $this->mode_payement;
	}
	
	function set_address1($address1){
		$this->address1=$address1;
	}
	function set_address2($address2){
		$this->address2=$address2;
	}
	function set_ville($ville){
		$this->ville=$ville;
	}
	function set_zip($zip){
		$this->zip=$zip;
	}
	function set_phone($phone){
		$this->phone=$phone;
	}
	function set_mode_payement($mode_payement){
		$this->mode_payement=$mode_payement;
	}

}
class commandeDetails {

	private $IdCommande ;
	private $NomProduit= array();
	private $IdProduit= array();
	private $PrixProduits= array();
    private $QTEProduits= array();

	function __construct($IdCommande,$NomProduit,$IdProduit,$PrixProduits,$QTEProduits){
		$this->IdCommande=$IdCommande;
		$this->NomProduit=$NomProduit;
		$this->IdProduit=$IdProduit;
		$this->PrixProduits=$PrixProduits;
		$this->QTEProduits=$QTEProduits;
	}

	function get_IdCommande(){
		return $this->IdCommande;
	}
	function get_NomProduit(){
		return $this->NomProduit;
	}
	function get_IdProduit(){
		return $this->IdProduit;
	}
	function get_PrixProduits(){
		return $this->PrixProduits;
	}
	function get_QTEProduits(){
		return $this->QTEProduits;
	}

	function set_IdCommande($IdCommande){
		$this->IdCommande=$IdCommande;
	}
	function set_NomProduit($NomProduit){
		$this->NomProduit=$NomProduit;
	}
	function set_IdProduit($IdProduit){
		$this->IdProduit=$IdProduit;
	}
	function set_PrixProduits($PrixProduits){
		$this->PrixProduits=$PrixProduits;
	}
	function set_QTEProduits($QTEProduits){
		$this->QTEProduits=$QTEProduits;
	}

}

?>
