<?php
require_once 'models/category.php';
require_once 'models/product.php';

class CategoryController{
    
    //Utils :: isAdmin (); check that it is admin to execute the actions
    public function index(){
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();
        
        require_once 'views/category/index.php';
    }
    
    //see category
    public function select(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //get category
            $category = new Category();
            $category->setId($id);
            $category = $category->getOne();
            
            //get category
            $product = new Product();
            $product->setCategory_id($id);
            $products = $product->getAllCategory();
        }
        
        require_once 'views/category/select.php';
    }

        public function create(){
        Utils::isAdmin();
        require_once 'views/category/create.php';
    }
    
    public function save(){
        Utils::isAdmin();
        
        if(isset($_POST) && isset($_POST['name'])){
            //Save category
            $category = new Category();
            $category->setName($_POST['name']);
            $category->save();
        }
        
        
        header("Location:".base_url."category/index");
    }
}