<?php

class controller{

    public function model($model)
    {
        require_once "./MVC/models/$model.php";
        return new $model;
    }

    public function view($view , $data = [])
    {
        if(is_array($data))
        {
            //chuyển tất cả các key của mảng thành biến
            extract($data);
        }
        require_once "./MVC/views/$view.php";
    
    }
}
?>