<?php
class App
{
    protected $controller = "Home";
    protected $action = "default";
    protected $params = [];
    function __construct()
    {
        $arr = $this->urlProcess();
        //xử lý controller
        if (isset($arr[0])) {
            if (file_exists("./MVC/controllers/" . ucfirst($arr[0]) . ".php")) {
                $this->controller = ucfirst($arr[0]);
                echo"". $this->controller ."";
                unset($arr[0]);
                require_once "./MVC/controllers/" . $this->controller . ".php";
                $this->controller = new $this->controller();

                //xử lý actions

                if (isset($arr[1])) {
                    if (method_exists($this->controller, $arr[1])) {
                        $this->action = $arr[1];
                    }
                    unset($arr[1]);
                }

                //Xử lý params
                $this->params =  array_values($arr);
                call_user_func_array(array( new $this->controller, $this->action), $this->params);
            } else {
                $this->loadError();
            }
        }
    }

    //hàm xử lý url
    function urlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        } else {
            return "/";
        }
    }

    // hàm gọi trang lỗi
    function loadError($name = "404")
    {
        require_once "./MVC/errors/404.php";
    }
}
