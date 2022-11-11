<?php

class View{

    function __construct(){
       
    }

    function mostrar($nombre){
        require 'views/' . $nombre . '.php';
    }
}

?>