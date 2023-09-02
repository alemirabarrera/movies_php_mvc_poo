<?php
require_once("controllers/error.php");

class App {
    function __construct()
    {   
        session_start();        
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
        if(!file_exists($archivoController)){
            $controller = new ErrorPage();           
        }else{
            if($url[0] == "dashboard" && !($_SESSION["login"])) {
                echo '<h1>You must first login to access the Dashboard module</h1>';                
                //here we can require a specfic controller for this msg
            }else{
                require_once($archivoController); //require the file
                $controler = new $url[0];
                //$controler->loardModel();
                if(isset($url[1])){
                    $controler->{$url[1]}();  //call the method
                }
            }                        
        }
        
    }
}
?>