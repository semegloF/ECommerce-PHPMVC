<?php
require_once 'models/product.php';

class CartController{

    public function index(){

        if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1){
        $cart = $_SESSION['cart'];
        }else{
            $cart = array();
        }

        require_once 'views/cart/index.php';
    }

    public function add(){


        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
        }else{
            header("Location:".base_url);
        }

        if(isset($_SESSION['cart'])) {


            $counter = 0;
            foreach($_SESSION['cart'] as $indice => $element){
                if($element['product_id'] == $product_id){
                    $_SESSION['cart'][$indice]['units']++;
                    $counter++;
                }
            }
        }
        if(!isset($counter)||$counter==0){
            // Get product
            $product = new Product();
            $product->setId($product_id);
            $product = $product->getOne();
            // Add to cart
            if (is_object($product)) {
                $_SESSION['cart'][] = array(
                    "product_id" => $product->id,
                    "price" => $product->price,
                    "units" => 1,
                    "product" => $product
                );
            }
        }
        header("Location:".base_url."cart/index");
    }

    public function delete(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['cart'][$index]);
        }
        header("Location:".base_url."cart/index");
    }
    
    public function up(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['cart'][$index]['units']++;
        }
        header("Location:".base_url."cart/index");
    }
    
    public function down(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['cart'][$index]['units']--;
            if($_SESSION['cart'][$index]['units'] == 0){
                unset($_SESSION['cart'][$index]);
            }
        }
        header("Location:".base_url."cart/index");
    }

    public function delete_all(){
        unset($_SESSION['cart']);
        header("Location:".base_url."cart/index");
    }

}