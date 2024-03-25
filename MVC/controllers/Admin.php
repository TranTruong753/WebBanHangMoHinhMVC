<?php

class Admin extends controller
{
    protected $data = [];

    function default($page = "ProductPage")
    {
        if ($page == "ProductPage") {
            $this->data["page"] = "ProductPage";
        } else if ($page == "PermissionPage") {
            $this->data["page"] = "PermissionPage";
        }else if ($page == "AddProductPage") {
            $this->data["page"]= "AddProductPage";
        }
        $this->view("manage/manage", $this->data);
    }
}
