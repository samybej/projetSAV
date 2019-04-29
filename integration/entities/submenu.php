<?PHP

class Submenu extends Category
{

protected $id_category;
protected $nom;
protected $id;
	function __construct($id_category,$nom){
		$this->id_category=$id;
		$this->nom=$nom;
	}
	function getid(){
		return $this->id_category;
	}
	function getnom(){
		return $this->nom;
	}


	function setid($id){
		$this->id_category=$id_category;
	}
	function setnom($nom){
		$this->nom=$nom;
	}


	
}

?>