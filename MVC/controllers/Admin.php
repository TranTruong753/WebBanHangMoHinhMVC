<?php

class Admin extends controller
{
    protected $data = [];

    function default($page = "1")
    {
        if ($page == "1") {

            $this->data["page"] = "PermissionPage";
        } else if ($page == "2") {
            $this->data["page"] = "ProductPage";
        }
        $this->view("manage/manage", $this->data);
    }

}
