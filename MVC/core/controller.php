<?php

class controller{

    public function model($model)
    {
        require_once "./MVC/models/$model.php";
        return new $model;
    }

    public function view($view , $data = [])
    {
       
            //chuyển tất cả các key của mảng thành biến
            // extract($data);
            // print()
        require_once "./MVC/views/$view.php";
    
    }
}
?>