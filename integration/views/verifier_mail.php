<meta charset="utf-8">
<?php
include "../entities/client.php";
include "../core/clientc.php";

 if (isset($_POST['adresse']) ) 
 {
     
     
     $client=new ClientC();
    $x=$_POST['adresse'];
     
     if($client->MailClientExiste($x))  
     { $liste=$client->RecuperMdpClient($x);
      $to = $x;
			$subject = "ton sujet";
			
            $headers = 	'From: azizbousselmi99@gmail.com <azizbousselmi99@gmail.com>';
			$headers .= 'content-Type:text/html;charset="uft-8"'."\n";
			$headers .= "\r\n";
			

       foreach ($liste as $value)
       {
       $message = 'votre nom d utilisateur :'.$value['nom_c_client']."\r\n"; 
        $message.='votre mot de passe :'.$value['mdp_client']."\r\n";}
      mail($to, $subject, $message,$headers);
       header('location:index.html');
     }
    else { 
        echo '<body onLoad="alert(\'ce mail n existe pas dans notre base de données\')">'; 
         // puis on le redirige vers la page d'accueil
         echo '<meta http-equiv="refresh" content="0;URL=mdp_oublier.html">'; }
        
         
     
     }



?>
