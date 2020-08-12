<?php
namespace Model;

use Core\Database;

class UserModel extends \Core\Database{
    private $email;
    private $password;

    public function save($email, $password){
        try {
            $connexion = $this->connexion();
            $request = "INSERT INTO users(
                                    email,
                                    password
                                    ) VALUES(
                                    :email
                                    :password);";
    
        $result_request = $connexion->prepare($request);
        $result_request->bindParam(':email', $email, \PDO::PARAM_STR);
        $result_request->bindParam(':password', $password, \PDO::PARAM_STR);
        $result_request->execute();
        return $result_request;
        }
        catch(\PDOException $e){
            echo $e->getMessage();
            return false;
        }


    }
}

