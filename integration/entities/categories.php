<?PHP
class Category{
	protected $id;
    protected $category;

	function __construct($category){
		$this->category=$category;
	}
	function getfid(){
		return $this->id;
	}
	function getcategory(){
		return $this->category;
	}


	function setid($id){
		$this->id=$id;
	}
	function setnomcategory($category){
		$this->category=$category;
	}


	
}

?>