<?php

include "../config.php";



class ClientC {
    
    
     function  MailClientExiste($mail){
    
    $connection = @mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('web');
    $sql="select * from client where email_client='".$mail."'";

 try{   
        $req=@mysql_query($sql);
       
     $count=0;
            while($row=@ mysql_fetch_array($req)){
             $count++;
             
            }
   
            if($count>=1) {return true ;}
            else {return false ;}
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
}
        function  etatClientExiste($mail){
    
    $connection = @mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('web');
    $sql="select * from client where email_client='".$mail."' and etat_client = 0";

 try{   
        $req=@mysql_query($sql);
       
     $count=0;
            while($row=@ mysql_fetch_array($req)){
             $count++;
             
            }
   
            if($count>=1) {return true ;}
            else {return false ;}
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
}
    
      function RecuperMdpClient($mail)
   {
       $sql="select * from client where email_client='".$mail."'";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   }
    
    
     function ajouterClient($client)
   {$sql="insert into client (nom_client,prenom_client,date_client,adress_client,email_client,tel_client,nom_c_client,mdp_client) values ( :nom,:prenom,:date_n,:adresse,:mail,:tel,:nom_c,:mdp)";
   
   $db = config::getConnexion();
    try {
        
        $req=$db->prepare($sql);
        
        
        $nom=$client->getNom_client();
        $prenom=$client->getprenom_client();
        $date_n=$client->getdate_client();
        $adresse=$client->getadress_client();
        $mail=$client->getmail_client();
        $tel=$client->gettel_client();
        $nom_c=$client->getnom_compte();
        $mdp=$client->getmdp_compte();

        $req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':date_n',$date_n);
        $req->bindValue(':adresse',$adresse);
        $req->bindValue(':mail',$mail);
        $req->bindValue(':tel',$tel);
        $req->bindValue(':nom_c',$nom_c);
        $req->bindValue(':mdp',$mdp);
        
        $req->execute();
    }
    catch (Exception $e)
    { echo 'erreur:'.$e->getMessage();}
   }
    
    
    public function Logedin($conn,$login,$pwd)
	{
		$req="select * from client   where nom_c_client='$login' && mdp_client='$pwd'";
		$rep=$conn->query($req);
		return $rep->fetchAll();
	}
    
    function afficherClient()
   {
       $sql="SELECT * FROM client";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   }
 
	function supprimerClient($nom_c_client){
		$sql="DELETE FROM client where nom_c_client= :nom_c_client";
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
    
       public static  function modifierClient($nom,$prenom,$adresse,$mail,$date,$tel,$compte,$mdp)
{
    
     
     $db =config::getConnexion();
     
                $s=$db->prepare('UPDATE client SET nom_client=:nom_client,prenom_client=:prenom_client,adress_client=:adress_client,email_client=:email_client,date_client=:date_client ,tel_client=:tel_client,nom_c_client=:nom_c_client,mdp_client=:mdp_client where nom_c_client=:nom_c_client') ;
               
        $s->bindParam(':nom_client', $nom);
        $s->bindParam(':prenom_client', $prenom);
        $s->bindParam(':adress_client', $adresse);
        $s->bindParam(':email_client',$mail);
           $s->bindParam(':date_client', $date);
        $s->bindParam(':tel_client', $tel);
        $s->bindParam(':nom_c_client', $compte);
        $s->bindParam(':mdp_client', $mdp);
        

               
             
                 $s->execute();
              
    
     
} 
	
}