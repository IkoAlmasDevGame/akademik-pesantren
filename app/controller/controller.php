<?php 
namespace controller;
use model\userAuthentication;

class Authentication {
    protected $konfigs;
    public function __construct($konfigs)
    {
        $this->konfigs = new userAuthentication($konfigs);
    }

    public function login(){
        session_start();
        $userInput = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $passInput = md5(htmlspecialchars($_POST['passInput']), false);
        $data = $this->konfigs->signin($userInput,$passInput);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

?>