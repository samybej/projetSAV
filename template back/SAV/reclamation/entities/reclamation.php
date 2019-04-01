<?PHP
class Reclamation{
	private $num_r;
	private $num_p;
	private $id_client;
	private $vote;
	private $commentaire;
	private $reclame;

	
	function __construct($num_r,$num_p,$id_client,$vote,$commentaire,$reclame){
		$this->num_r=$num_r;
		$this->num_p=$num_p;
		$this->id_client=$id_client;
		$this->vote=$vote;
		$this->commentaire=$commentaire;
		$this->reclame=$reclame;
	}
	
	function getNum_r(){
		return $this->num_r;
	}
	function getNum_p(){
		return $this->num_p;
	}
	function getId_client(){
		return $this->id_client;
	}
	function getVote(){
		return $this->vote;
	}
	function getCommentaire(){
		return $this->commentaire;
	}
	function getReclame(){
		return $this->reclame;
	}

	function setVote($vote){
		$this->vote=$vote;
	}
	function setNum_p($num_p){
		$this->num_p;
	}
	function setId_client($id_client){
		$this->id_client=$id_client;
	}
	function setCommentaire($commentaire){
		$this->commentaire=$commentaire;
	}
	function setReclame($reclame){
		$this->reclame=$reclame;
	}
	
}

?>