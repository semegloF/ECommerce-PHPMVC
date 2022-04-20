<?php

class User{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $pw;
    private $role;
    private $image;
    private $db;
    
    public function __construct() {
    $this->db = Database::connect();;
    }
    //connection variable to db
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPw() {
        return password_hash($this->db->real_escape_string($this->pw), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRole() {
        return $this->role;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }

    function setLastname($lastname) {
        $this->lastname = $this->db->real_escape_string($lastname);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPw($pw) {
        $this->pw = $pw;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setImage($image) {
        $this->image = $image;
    }

    //save
    public function save(){
        $sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getLastname()}', '{$this->getEmail()}', '{$this->getPw()}', 'user', null);";
        $save = $this->db->query($sql);
        
        $result = FALSE;
        if ($save){
            $result = TRUE;
        }
        return $result;
    }
    
    public function login(){
        $result = FALSE;
        $email = $this->email;
        $pw = $this->pw;
        
        //check if user exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();
            
            //Password verify
            $verify = password_verify($pw, $user->pw);
            
            if($verify){
                $result = $user;
            }
        }
        return $result;
    }
    
}
