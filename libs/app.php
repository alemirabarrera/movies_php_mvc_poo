<?php
require_once("controllers/error.php");

class App {
    function __construct()
    {             
        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        if(empty($url[0])){
            $archivoController = "controllers/createUser.php";
            require_once($archivoController);
            $controler = new CreateUser();
            return false;
        }

        $archivoController = "controllers/". $url[0]. ".php";
        if(file_exists($archivoController)){
            require_once($archivoController); //require the file
            $controler = new $url[0];
            //$controler->loardModel();
            if(isset($url[1])){
                $controler->{$url[1]}();  //call the method
            }
        }else{
            $controller = new ErrorPage();
        }
        
    }
}
?>