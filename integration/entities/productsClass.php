<?PHP
class Products{
	private $id;
    private $libelle;
    private $prix ; 
    private $img ; 

	function __construct($id,$libelles,$prix,$img){
		$this->id=$id;
		$this->libelles=$libelles;
        $this->prix =$prix ;
        $this->img=$img;
	}
	
	function getid(){
		return $this->id;
	}
	function getlibelle(){
		return $this->libelle;
	}
	function getprix (){
		return $this->prix ;
	}
	function getimg (){
		return $this->img ;
	}

	function setlibelle($libelle){
		$this->libelles=$libelle;
	}
	function setprix ($prix ){
		$this->prix=$prix ;
	}
	function setimg ($img ){
		$this->img=$img ;
	}
	
}

?>