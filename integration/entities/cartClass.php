<?php 
class Cart
{

    private $DB;
    public function __construct($DB)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_GET['del'])) {
            $this->delete($_GET['del']);
        }

        $this->DB = $DB;
        if (isset($_POST['cart']['quantity'])) {
            $this->recalc();
        }
    }

 

    public function add($product_id)
    {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    }

    public function delete($product_id)
    {
        unset($_SESSION['cart'][$product_id]);
    }

    public function total()
    {
        $total = 0;

        $ids = array_keys($_SESSION['cart']);
        if (empty($ids)) {
            $produit = [];
        } else {
            $i=implode(',', $ids);
            $j=substr($i, 1);
            $produit = $this->DB->query('SELECT * FROM produit WHERE numero IN(' . $j . ')');
        }

        foreach ($produit as $product) {
            $total += (int)$product->price * $_SESSION['cart'][$product->numero];
        }
        return $total;
    }

    public function count()
    {
        return array_sum($_SESSION['cart']);
    }
}
