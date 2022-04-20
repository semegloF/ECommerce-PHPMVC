<?php
require_once 'models/product.php';

class ProductController{
    
    public function index(){
        $product = new Product();
        $products = $product->getRandom(6);


        //render view
        require_once 'views/product/featured.php';
    }
    
    //seelect product
    public function select(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $product = new Product();
            $product->setId($id);
            $product = $product->getOne();
        }
        require_once 'views/product/select.php';
    }


    //gestion product
    public function gestion(){
        Utils::isAdmin();
        
        //get all products
        $product = new Product();
        $products = $product->getAll();
        
        require_once 'views/product/gestion.php';
    }
    //crear producto
    public function create(){
        Utils::isAdmin();
        
        require_once 'views/product/create.php';
    }
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $name = isset($_POST['name']) ? $_POST['name'] : FALSE;
            $description = isset($_POST['description']) ? $_POST['description'] : FALSE;
            $price = isset($_POST['price']) ? $_POST['price'] : FALSE;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : FALSE;
            $category = isset($_POST['category']) ? $_POST['category'] : FALSE;
            $image = isset($_POST['image']) ? $_POST['image'] : FALSE;
            
            if($name && $description && $price && $stock && $category){
                $product = new Product();
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategory_id($category);
                
                //Save image
                if(isset($_FILES['image'])){
                    $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];
                
                if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, TRUE);
                    }
                    
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    $product->setImage($filename);
                 }
                }
                
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $product->setId($id);
                    
                    $save = $product->edit(); //edit if it comes by parameter
                }else {
                    $save = $product->save(); // save if it does not come by parameter
                }
              
                if($save){
                    $_SESSION['product'] = "complete";
                }else{
                    $_SESSION['product'] = "failed";
                }
            }  else {
                $_SESSION['product'] = "failed";
            }
        }else{
        $_SESSION['product'] = "failed";
        }
        header("Location:".base_url.'product/gestion');
    }
    
    //Edit product
    public function edit(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = TRUE;
            $product = new Product();
            $product->setId($id);
            $pro = $product->getOne();
            
            require_once 'views/product/create.php';
        }else{
            header("Location:".base_url."product/gestion");
        }
        
    }
    
    //Delete product
    public function deletee(){
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = new Product();
            $product->setId($id);
            $delete = $product->deletee();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        header("Location:".base_url."product/gestion");
    }
}