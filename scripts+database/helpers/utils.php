<?php


class Utils{
    
    
    //End session
    public static function deleteSession($name){
        
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = NULL;
            unset($_SESSION[$name]);
        }
        return $name;
        
    }
    
    //If it's an admin
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return TRUE;
        }
    }
    
    public static function isIdentity(){
        if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
        }else{
            return TRUE;
        }
    }

    //show categories in the menu
    public static function showCategories(){
        require_once 'models/category.php';
        $category = new Category();
        $categories = $category->getAll();
        return $categories;
    }
    
    public static function statutCart(){
        $statut = array(
            'count' => 0,
            'total' => 0
        );
        
        if(isset($_SESSION['cart'])){
            $statut['count'] = count($_SESSION['cart']);
            
            //calculate total
            foreach ($_SESSION['cart'] as  $product){
                $statut['total'] += $product['price'] * $product['units'];
            }
            
        }
        return $statut;
    }
    
    public static function showStatus($statut){
        $value = 'Pending';
        if($status == 'confirm'){
            $value = 'Pending';
        }elseif($status == 'preparation'){
            $value = 'In preparation';
        }elseif($status == 'ready'){
            $value = 'Ready to ship';
        }elseif($status == 'sended'){
            $value = 'Sent';
        }
        return $value;
    }
    
    
}
