<?php
class Controller {
    public $view;
    public $model;
    function __construct(){                
        $this->view = new View();
    }
    
    public function loadModel($model){
        $url = "models/".$model.".php";
        if(file_exists($url)){                 
            require $url;                  
            $this->model = new $model;
        }else{            
            echo "</br>Doesn't exist the model path</br>";
        }

    }
}

?>