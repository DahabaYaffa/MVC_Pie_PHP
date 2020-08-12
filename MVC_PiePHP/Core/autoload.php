<?php

function autoloader(string $class)
{
    $path = "";
    if (substr_count($class, "Controller") === 2)
        $path = "src/Controller/";
    else if (substr_count($class, "Model") === 2)
        $path = "src/Model/";
    $extension = ".php";
    $separator = explode("\\", $class); //Ca c'est pour séparer la class avec le namespace
    $class = $separator[1];
    $fullPath = $path . $class . $extension;
    if (is_file($fullPath) || is_file(__DIR__ . "/" . $fullPath)) {
        require_once($fullPath);
    }
}
spl_autoload_register("autoloader");
