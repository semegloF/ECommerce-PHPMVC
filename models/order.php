<?php

class Order{
    private $id;
    private $user_id;
    private $province;
    private $city;
    private $adresse;
    private $price;
	private $statut;
    private $datee;
    private $timee;
    
    private $db;
    
    public function __construct() {
    $this->db = Database::connect();;
    }
    function getId() {
        return $this->id;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getProvince() {
        return $this->province;
    }

    function getCity() {
        return $this->city;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getPrice() {
        return $this->price;
    }

  function getStatut() {
        return $this->statut;
    }

    function getDatee() {
        return $this->datee;
    }

 function getTimee() {
        return $this->timee;
    }

 
    function setId($id) {
        $this->id = $id;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setProvince($province) {
        $this->province = $this->db->real_escape_string($province);
    }

    function setAdresse($adresse) {
        $this->adresse = $this->db->real_escape_string($adresse);
    }

    function setCity($city) {
        $this->city = $this->db->real_escape_string($city);
    }

    function setPrice($price) {
        $this->price = $price;
    }

  function setStatut($statut) {
        $this->statut = $statut;
    }


    function setDate($date) {
        $this->date = $date;
    }
	
	   function setTimee($timee) {
        $this->timee = $timee;
    }

    
    
    public function getAll(){
        $products = $this->db->query("SELECT * FROM orders ORDER BY id DESC");
        return $products;
    }
    

    public function getOne(){
        $products = $this->db->query("SELECT * FROM orders WHERE id = {$this->getId()}");
        return $products->fetch_object();
    }
    
    public function getOneByUser(){
        $sql = "SELECT p.id, p.price FROM orders p "
               //. "INNER JOIN orders_lines lp ON lp.order_id = p.id"
                . "WHERE p.user_id = {$this->getUser_id()} ORDER BY id DESC LIMIT 1";
        $order = $this->db->query($sql);
        return $order->fetch_object();
    }
    
    //orders from a user
    public function getAllByUser(){
        $sql = "SELECT p.* FROM orders p "               
                . "WHERE p.user_id = {$this->getUser_id()} ORDER BY id DESC";
        $order = $this->db->query($sql);
        return $order;
    }
    
    public function getProductByOrder($id){
                
        $sql = "SELECT pr.*, lp.units FROM products pr "
                ."INNER JOIN order_lines lp ON pr.id = lp.product_id "
                ."WHERE lp.order_id = {$id}";
                
        $products = $this->db->query($sql);
        return $products;        
    }
        //save
    public function save(){
        $sql = "INSERT INTO orders VALUES(NULL, {$this->getUser_id()},'{$this->getProvince()}', '{$this->getCity()}', '{$this->getAdresse()}', {$this->getPrice()}, 'confirm', CURDATE());";
        $save = $this->db->query($sql);
        
        $result = FALSE;
        if ($save){
            $result = TRUE;
        }
        return $result;
    }
    
    public function save_line(){
        $sql = "SELECT LAST_INSERT_ID() as 'order';";
        
        
        $query = $this->db->query($sql);
        $order_id = $query->fetch_object()->order;
        
        foreach ($_SESSION['cart'] as  $element){ 
            $product = $element['product'];
            
            $insert = "INSERT INTO orders_lines VALUES(NULL, {$order_id}, {$product->id}, {$element['units']});";
            
           $save = $this->db->query($insert);
        }
        $result = FALSE;
        if ($save){
            $result = TRUE;
        }
        return $result;
    }
    
    public function edit(){
        $sql = "UPDATE orders SET statut ='{$this->getStatut()}' ";
	$sql .= " WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);
        
        $result = FALSE;
        if ($save){
            $result = TRUE;
        }
        return $result;
    }
    
}