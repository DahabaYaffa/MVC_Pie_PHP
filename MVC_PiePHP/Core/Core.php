<?php
namespace Core;

class Core{
    public function run(){
        include "src/routes.php";
        $request_url = "/".str_replace(str_replace("index.php","",$_SERVER["SCRIPT_NAME"]), "", $_SERVER["REQUEST_URI"]);
        $sett = explode("/", $request_url);
        if ($array = Router::get($request_url)) {
            $sett[1] = $array["controller"];
            $sett[2] = $array["action"];
        }
        $sett1 = "Controller\AppController";
        if ($sett[1] != "") {
            $sett1 = "Controller\\".ucfirst($sett[1])."Controller";
        }
        $sett2 = "indexAction";
        if (isset($sett[2]) && $sett[2] != "") {
            $sett2 = $sett[2]."Action";
        }
        if (!class_exists($sett1)) {
            include("src/View/Error/404.php");
            exit;
        }
        $controller = new $sett1();
        if (!method_exists($controller, $sett2)) {
            include("src/View/Error/404.php");
            exit;
        }
        $controller->$sett2();
    }
    }

