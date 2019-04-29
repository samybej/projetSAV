<?php
include "../entities/client.php";
include "../core/clientC.php";

 
    if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['date_N'])and  isset($_POST['adresse'])and isset($_POST['email'])and isset($_POST['phone'])  and isset($_POST['nom_c'])  and isset($_POST['mdp']) ) 
 {
     $clientC=new clientC();
     
        
    
     $client=new Client($_POST['nom'],$_POST['prenom'],$_POST['date_N'],$_POST['adresse'],$_POST['email'] ,$_POST['phone'],$_POST['nom_c'], $_POST['mdp'] );
     
     $clientC->ajouterClient($client);
     header('location:../views/index.php');
     }
else { echo "verifier les champs";
}



?>
