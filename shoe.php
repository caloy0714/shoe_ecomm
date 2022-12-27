<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'components/connect.php';
include 'components/wishlist_cart.php';

class shoe{

    public function home(){
        if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        }else{
        $user_id = '';
        };

        $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
        $select_products->execute();
        if($select_products->rowCount() > 0){
        while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){}}

     header('Location: home.php');
    }
}