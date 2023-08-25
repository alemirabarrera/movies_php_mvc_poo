<?php 
class ErrorPage extends Controller{        
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Ops! Error al cargar el recurso";
        $this->view->render("error/index");
    }
}
?>