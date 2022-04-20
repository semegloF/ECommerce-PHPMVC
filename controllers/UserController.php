<?php

require_once 'models/user.php';

class UserController{
    
    public function index(){
        echo "ControllerUsers, Action index";
    }
    
    public function register(){
        require_once 'views/user/register.php';
    }
    
    //save user
    public function save(){
        if(isset($_POST)){
            $name = isset($_POST['name']) ? $_POST['name'] : FALSE;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : FALSE;
            $email = isset($_POST['email']) ? $_POST['email'] : FALSE;
            $pw = isset($_POST['pw']) ? $_POST['pw'] : FALSE;
            
            if($name && $lastname && $email && $pw){
                    $user = new User();
                    $user->setName($name);
                    $user->setLastname($lastname);
                    $user->setEmail($email);
                    $user->setPw($pw);
                    
                    $errores = array();
                    
                    //NAME (VALIDATE)
                        if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
                        $name_validate = TRUE;
                    } else {
                        $name_validate = FALSE;
                        $errores['name'] = "Plz write a valide Name";
                    }
                
                    //LASTNAME (VALIDATE)
                    if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
                        $lastname_validate = TRUE;
                    } else {
                        $lastname_validate = FALSE;
                        $errores['$lastname'] = "Plz write a valide Lastname";
                    }
                    
                     // EMAIL (VALIDATE)
                    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $email_validate = TRUE;
                    } else {
                        $email_validate = FALSE;
                        $errores['email'] = "Plz write a valide E-mail";
                    }
                    
                    //PASSWORD (VALIDATE)
                    if (!empty($pw)) {
                        $pw_validate = TRUE;
                    } else {
                        $pw_validate = FALSE;
                        $errores['pw'] = "Plz write a valide Password";
                    }
                    
                    $save_user = FALSE;
                    if(count($errores) == 0){
                        $save_user = TRUE;
                    }

                $save = $user->save();
                    if($save){
                        $_SESSION['register'] = "complete";
                    }else{
                        $_SESSION['register'] = "failed";
                    }
            }else{
                $_SESSION['register'] = "failed";
            }           
            
        }else{
            $_SESSION['register'] = "failed";
            
        }
        header("Location:".base_url.'user/register');
    }
    
    
    //login
    public function login(){
        if (isset($_POST)){
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPw($_POST['pw']);
            
            $identity = $user->login();
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                
                if($identity->role == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Plz make sure you put the correct infos...';
            }
            
            
        }
        header("Location:".base_url);
    }
    
    //logout
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        
        header("Location:".base_url);
    }
}