<?php
require_once 'models/order.php';

class OrderController{
    
    public function make(){
        
        
        require_once 'views/order/make.php';
    }
    
    public function add(){
        
        
        if(isset($_SESSION['identity'])){
            $user_id = $_SESSION['identity']->id;

            $province = isset($_POST['province']) ? $_POST['province'] : false;
            $city = isset($_POST['city']) ? $_POST['city'] : false;
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : false;   
            $statut = Utils::statutCart();
            $price = $statut['total'];

            if($province && $city && $adresse){
                //save data to db
                $order = new Order();
                $order->setUser_id($user_id);
                $order->setProvince($province);
                $order->setCity($city);
                $order->setAdresse($adresse);
                $order->setPrice($price);
                
                $save = $order->save();
                
                //save order_line
                $save_line = $order->save_line();
                
                if($save && $save_line){
                    
                    $_SESSION['order'] = "complete";
                    
                }else{
                    $_SESSION['order'] = "failed";
                }
                
            }else{
                $_SESSION['order'] = "failed";
            }
            
            header("Location:".base_url."order/confirme");
            
        }else{
            //redirect to index
            header("Location:".base_url);
            
        }
    }
    
    public function confirme(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $order = new Order();
            $order->setUser_id($identity->id);
            $order = $order->getOneByUser();
            
            $order_products = new Order();
            $products = $order_products->getProductByOrder($order->id);
        }
    
        require_once 'views/order/confirme.php';
    }
   
    public function my_orders(){
        Utils::isIdentity();
        $user_id = $_SESSION['identity']->id;
        $order = new Order();
        
        //remove user orders
        $order->setUser_id($user_id);
        $orders= $order->getAllByUser();
        
        require_once 'views/order/my_orders.php';
    }
    
    public function detail(){
        Utils::isIdentity();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            //take out the order
            $order = new Order();
            $order->setId($id);
            $order = $order->getOne();
            
            //take out the products
            $order_products = new Order();
            $products = $order_products->getProductByOrder($id);
            
            require_once 'views/order/detail.php';
        }else{
            header("Location:".base_url."order/my_orders");
        }      
    }
    
    public function gestion(){
        Utils::isAdmin();
        $gestion = TRUE;
        
        $order = new Order();
        $orders = $order->getAll();
        
        require_once 'views/order/my_orders.php';
    }
    
    public function statut(){
        Utils::isAdmin();
        if(isset($_POST['order_id']) && isset($_POST['statut'])){
            //collect form data
            $id = $_POST['order_id'];
            $statut = $_POST['statut'];
            //order update
            $order = new Order();
            $order->setId($id);
            $order->setStatut($statut);
            $order->edit();
            header("Location:".base_url."order/detail&id=$id");
            ob_end_flush();
           
        }else{
            header("Location:".base_url);
        }      
    }
}