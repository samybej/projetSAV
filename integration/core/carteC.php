<?php

include "../config.php";

class CarteC {
    
    
    function ajouterCarte($carte)
    {
        $sql="insert into carte_fidelite (nom_c_client) values (:nom_c_client)";
        
        $db=config::getConnexion();
        try {
             $req=$db->prepare($sql);
        
        
        $nom_c_client=$carte->getIDclient();
       
       

        $req->bindValue(':nom_c_client',$nom_c_client);
     
        
        
        $req->execute();
        }
         catch (Exception $e)
    { echo 'erreur:'.$e->getMessage();}
   }
    
    
    
    
    
    
    
    function afficherCarte()
   {
       $sql="SELECT * FROM carte_fidelite";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   }
    
    function supprimerCarte($nom_c_client){
		$sql="DELETE FROM carte_fidelite where nom_c_client= :nom_c_client";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':nom_c_client',$nom_c_client);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    
    
    
    
    
    
    
    
    
    
    
    }
?>