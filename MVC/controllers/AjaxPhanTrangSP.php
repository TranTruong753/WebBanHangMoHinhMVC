<?php

class AjaxPhanTrangSP extends controller{
    protected $PhanTrangModel ;

    public function __construct() {
        $this->PhanTrangModel = $this->model("PhanTrangModel");
    }

    public function getPhanTrangCL() {
        $table = $_POST["table"];
        $condition = $_POST["condition"];
        $index =$_POST["index"];
        $size = $_POST["size"];
        
        // echo "table: $table <br>";
        if(isset($_POST["key"]))
        {
            $varibleEqual = "";
            $key=$_POST["key"];
       
            if($table == 'chitietsanpham')
            {   //$masp=$_POST["masp"];
                $varibleEqual.= "  sanpham.TenSanPham";
            }
            
            if($condition == "")
            {
                $condition.= " where ";
            } 
            else
            {
                $condition.= " AND ";
            } 
            
            $condition .= " concat($varibleEqual) like '%$key%' GROUP BY chitietsanpham.MaSanPham";
            // echo "condition: ".$condition;
            echo $this->PhanTrangModel->PhanTrangCL($index,$size,$table,$condition);


        }else
        {
            echo $this->PhanTrangModel->PhanTrangCL($index,$size,$table,$condition);

        }
    }

    public function getPhanTrangTL() {
        $table = $_POST["table"];
        $condition = $_POST["condition"];
        $index =$_POST["index"];
        $size = $_POST["size"];
        
        // echo "table: $table <br>";
        if(isset($_POST["key"]))
        {
            $varibleEqual = "";
            $key=$_POST["key"];
       
            if($table == 'chitietsanpham')
            {   //$masp=$_POST["masp"];
                $varibleEqual.= "  sanpham.TenSanPham";
            }
            
            if($condition == "")
            {
                $condition.= " where ";
            } 
            else
            {
                $condition.= " AND ";
            } 
            
            $condition .= " concat($varibleEqual) like '%$key%' GROUP BY chitietsanpham.MaSanPham";
            // echo "condition: ".$condition;
            echo $this->PhanTrangModel->PhanTrangTL($index,$size,$table,$condition);


        }else
        {
            echo $this->PhanTrangModel->PhanTrangTL($index,$size,$table,$condition);

        }
    }
    public function getPhanTrang() {
        $table = $_POST["table"];
        $condition = $_POST["condition"];
        $index =$_POST["index"];
        $size = $_POST["size"];
        
        // echo "table: $table <br>";
        if(isset($_POST["key"]))
        {
            $varibleEqual = "";
            $key=$_POST["key"];
       
            if($table == 'chitietsanpham')
            {   //$masp=$_POST["masp"];
                $varibleEqual.= "  sanpham.TenSanPham";
            }
            
            if($condition == "")
            {
                $condition.= " where ";
            } 
            else
            {
                $condition.= " AND ";
            } 
            
            $condition .= " concat($varibleEqual) like '%$key%' GROUP BY chitietsanpham.MaSanPham";
            // echo "condition: ".$condition;
            echo $this->PhanTrangModel->PhanTrangbt($index,$size,$table,$condition);


        }else
        {
            echo $this->PhanTrangModel->PhanTrangbt($index,$size,$table,$condition);

        }
    }
    
}
?>