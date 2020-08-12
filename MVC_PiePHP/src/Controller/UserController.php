<?php
namespace Controller;

use Model\UserModel;

class UserController extends \Core\Controller{
    private $model;
    function __construct() {
        //$this->model = new \Model\UserModel();
    }
    public function indexAction() {
        echo "Hello World !";
    }
    public function addAction(){
        echo "Bon URL";
        $this->render("login");
    }
    public function registerAction(){
        $user = new \Model\UserModel();
        if(isset($_POST['send'])){
        $email = htmlspecialchars($_POST['email']); 
        $password = sha1($_POST['password']);
        
        $user->save($email,$password);
        var_dump($_POST);
    }
}

}
