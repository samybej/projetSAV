<?php 
session_start();

include "../core/avisC.php";

$num_p=$_POST['num_p'];
//var_dump($messages);
$id_client=$_SESSION['id'];

$avis1C = new AvisC();

if ($avis1C->verifierExistAvis($num_p) == true ){
$resultat_final = $avis1C->moyenneAvis($num_p);

//var_dump($resultat_final);

if ($resultat_final == '5'){
	?>
	<div style="width:100px; height:80px;"><img src="img/icons/5stars.png"/></div>
	<?php
}
else if ($resultat_final < '5' && $resultat_final > '4'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/4starshalf.png"/></div>
	<?php
}
else if ($resultat_final == '4'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/4stars.png"/></div>
	<?php
}
else if ($resultat_final < '4' && $resultat_final > '3'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/3starshalf.png"/></div>
	<?php
}
else if ($resultat_final == '3'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/3stars.png"/></div>
	<?php
}
else if ($resultat_final < '3' && $resultat_final > '2'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/2starshalf.png"/></div>
	<?php
}
else if ($resultat_final == '2'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/2stars.png" alt="aaaaa"/></div>
	<?php
}
else if ($resultat_final < '2' && $resultat_final > '1'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/1starhalf.png"/></div>
	<?php
}
else if ($resultat_final == '1'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/1stars.png"/></div>
	<?php
}
else if ($resultat_final < '1' && $resultat_final > '0'){
?>
<div style="width:100px; height:80px;"><img src="img/icons/0starshalf.png"/></div>
	<?php
}
else {
?>
<p> aaaaaaaaaaaaaa </p>
	<?php
}
}
?>