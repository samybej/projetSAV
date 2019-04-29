<?php 
require_once ('db.php'); 
include "../entities/cartClass.php" ;
$DB = new DB('localhost','root','','projetweb'); 
$cart = new Cart($DB);

$json = ['error' => true];

if (isset($_GET['product_id'])) {
   
    $selected_product = $DB->query('SELECT * FROM produit WHERE numero = :numero', ['numero' => $_GET['product_id']]);
    if (empty($selected_product)) {
        $json['error'] = true;
        $json['message'] = 'Le produit selectionné n\'existe pas';
    } else {
        $cart->add($selected_product[0]->numero);
        $json['error'] = false;
        $json['count'] = $cart->count();
        $json['message'] = 'l ajout au panier s effectue avec succes';
        header('Location: ../views/cart.php');
    }
} 

?> 
