<?php

class Category{
    private $id;
    private $name;
    private $db;
    
    public function __construct() {
    $this->db = Database::connect();;
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDb() {
        return $this->db;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function getAll(){
        $categories = $this->db->query("SELECT * FROM categories ORDER BY id DESC");
        return $categories;
    }
    
    public function getOne(){
        $category = $this->db->query("SELECT * FROM categories WHERE id = {$this->getId()}");
        return $category->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categories VALUES(NULL,'{$this->getName()}');";
        $save = $this->db->query($sql);
        
        $result = FALSE;
        if($save){
            $result = TRUE;
        }
        return $result;
    }
}