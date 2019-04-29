<?PHP
class Produit{
	private $first_name;
	private $product_title;
	private $price;
	private $tax;
	private $quantity;
	private $descreption;
	private $sale;
	private $category;
	private $numero;
	private $size_xs;
	private $size_S;
	private $size_M;
	private $size_L;
	private $final_price;
    private $img_localisation;
    private $img_details1_localisation;
    private $img_details2_localisation;

	function __construct($first_name,$product_title,$price,$tax,$quantity,$descreption,$sale,$category,$size_xs,$size_S,$size_M,$size_L,$img_localisation,$img_details1_localisation,$img_details2_localisation){
		$this->first_name=$first_name;
		$this->product_title=$product_title;
		$this->price=$price;
		$this->tax=$tax;
		$this->quantity=$quantity;
		$this->descreption=$descreption;
		$this->sale=$sale;
		$this->category=$category;
		$this->size_xs=$size_xs;
		$this->size_S=$size_S;
		$this->size_M=$size_M;
		$this->size_L=$size_L;
		$this->final_price=$price+$tax;
		$this->img_localisation=$img_localisation;
		$this->img_details1_localisation=$img_details1_localisation;
		$this->img_details2_localisation=$img_details2_localisation;
	}
	function getfirstname(){
		return $this->first_name;
	}
	function getTitle(){
		return $this->product_title;
	}
	function getPrice(){
		return $this->price;
	}
	function getTax(){
		return $this->tax;
	}
	function getQuantity(){
		return $this->quantity;
	}
	function getDescreption(){
		return $this->descreption;
	}
	function getSale(){
		$this->sale;
	}
	function getCategory(){
		return $this->category;
	}
	function getnum(){
		return $this->numero;
	}
	function getSize_xs(){
		return $this->size_xs;
	}
	function getSize_S(){
		return $this->size_S;
	}
	function getSize_M(){
		return $this->size_M;
	}
	function getSize_L(){
		return $this->size_L;
	}
	function getfinalprice(){
		return $this->final_price;
	}
    function getlocal(){
    	return $this->img_localisation;
    }
    function getlocal1(){
    	return $this->img_details1_localisation;
    }
    function getlocal2(){
    	return $this->img_details2_localisation;
    }

	function setFirstname($first_name){
		$this->first_name=$first_name;
	}
	function setTitle($product_title){
		$this->product_title=$product_title;
	}
	function setPrice($price){
		$this->price=$price;
	}
	function setTax($tax){
		$this->tax=$tax;
	}
	function setQuantity($quantity){
		$this->quantity=$quantity;
	}
	function setDescreption($descreption){
		$this->descreption=$descreption;
	}
	function setSale($sale){
		$this->sale=$sale;
	}
	function setCategory($category){
		$this->category=$category;
	}
	function setsizexs($size_xs){
		$this->size_xs=$size_xs;
	}


	
}

?>