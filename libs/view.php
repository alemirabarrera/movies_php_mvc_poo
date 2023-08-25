<?php

class View {
    public $data;    
    function __construct(){        
    }    

    public function render($nombre){
        require "views/". $nombre .".php";
    }
}

?>