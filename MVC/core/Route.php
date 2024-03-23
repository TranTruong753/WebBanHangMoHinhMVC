<?php
class Route{

    public function __construct(){
        echo"Routes class";
    }

    public function handleRouted(){
        global $__routes;
        echo "<pre> ";
        print_r($__routes);
        echo "</pre>";
        }

}

?>