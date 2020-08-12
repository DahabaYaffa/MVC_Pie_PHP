<?php

namespace Core;

class Controller
{
    private static $_render;
    protected function render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(str_replace("\\", "", get_class($this)))), $view]) . '.php';

        if (file_exists($f)) {
            ob_start();
            include($f);
            $this->view = ob_get_clean();
            // ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        }
    }
    function __destruct()
    {
        if (isset($this->view)) {
            echo $this->view;
        }
        if (isset(self::$_render)) {
            echo self::$_render;
        }
    }
}
