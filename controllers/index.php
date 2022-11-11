<?php

class Index extends Controller{
    function __construct(){
        parent::__construct();   
    }

    function mostrar(){
        $this->view->mostrar('index/index');
    }

    function saludo(){
        echo "<p>Hola a todos<p>";
    }
}

?>