
<HTML>
<head>
	<link rel="stylesheet" type="text/css" href="../css/chat-style.css">
	<link rel="stylesheet" href="css/center.css">
	<link rel="stylesheet" href="css/zebra.css">  
	<link rel="stylesheet" type="text/css" href="style.css">
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <script type="text/javascript" src="scripts.js"></script>
	<script type="text/javascript" src="trier.js"></script>   
</head>
<body>
	<body>
	<div style="background-color: #ffe6ff";>
	<p>
	<img src="img/Logo/logo.JPG" alt="logo_bazart" width="300" height="300" class="center"/>
</p>
</div>
</body>
<?PHP

include "../../entities/reclamation.php";
include "../../core/reclamationC.php";

if (isset($_GET['num_r'])){
	$reclamationC=new ReclamationC();
	$result=$reclamationC->recupererReclamation($_GET['num_r']);
	foreach($result as $row){
		$num_r=$row['num_r'];
		$num_p=$row['num_c'];
		$id_client=$row['id_client'];
		$reclamation=$row['reclame'];
?>
<div>
		<div id="client" style="display:none;"><?php echo $id_client?></div>
		<div class="chat" align="center">
			<div class="messages" style="overflow-y: scroll;"></div>
			<textarea class="entree"></textarea>
		</div>
	</div>


<?PHP
	}
}
/*if (isset($_POST['envoyer'])){
	$reclamation=new Reclamation($num_p,$id_client,$vote,$commentaire,$reclamation);
	#$reclamation->setReponse($_POST['reponse']);
	$reclamationC->repondreReclam($_GET['num_r'],$_POST['reponse']);

	header('Location: afficherReclamation.php');
	
}*/
?>

	<script	src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
	<script src="chat.js"></script>

</body>
</HTMl>
