<?php

namespace Core;

use \PDO;

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    public function connexion()
    {

        try {
            $connexion = new PDO("mysql:host=".$this->servername.";dbname=mvc_pie_php", $this->username, $this->password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /* echo "Connexion réussie";*/
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $connexion;
    }
}
