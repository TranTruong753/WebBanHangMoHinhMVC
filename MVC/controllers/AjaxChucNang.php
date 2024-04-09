<?php 

class AjaxChucNang extends controller {

    private $ChucNangModel;
    public function __construct() {
        $this->ChucNangModel = $this->model("ChucNangModel");
    }

    public function DoiTrangThai () {
        $ma = $_POST["ma"];
        $trangThai = $_POST["trangThai"];
        $this->ChucNangModel->updateTrangThai($ma,$trangThai);
    }
    public function ThemDuLieu()
    {
        $tenChucNang = $_POST["TenChucNang"];
        $trangThai = 1;
        if($this->ChucNangModel->insert($tenChucNang,$trangThai) == 1)
        {
            echo 1;
        }else echo 0;
    }

    public function TimKiemQuaTen() {
        $tenChucNang = $_POST["TenChucNang"];
        if($this->ChucNangModel->TimKiemQuaTen($tenChucNang) == 1)
        {
            echo 1 ;
        }
        else echo 0;
        
    }
    public function getDanhSach()
{
    $key = $_POST["key"];
    $index = $_POST["index"];
    $size = $_POST["size"];
    $result = $this->ChucNangModel->getDanhSach($key,$index,$size);
    $render = "";

    if($result->num_rows > 0 )
    {
        while($row = $result->fetch_assoc())
        {
            $render .= "
            <tr>
          <th style='text-align: center;' scope='row'>". $row['MaChucNang'] ."</th>
          <td style='text-align: center;'>". $row['TenChucNang'] ."</td>
          <td style='text-align: center;'>
            <input onchange='DoiTrangThaiChucNang(this)' id='". $row['MaChucNang'] ."' type='checkbox' value='1'";  
            
            if ($row['TrangThai'] == 1) {
            $render.= "checked = 'checked'";
        }
            $render .= "/>
          </td>
          <td style='text-align: center;'>
            <pre><a href='http://localhost/WebBanHangMoHinhMVC/admin/default/SuaChucNangPage,".$row["MaChucNang"]."'>Sửa</a></pre>
          </td>
        </tr>
            ";
        }
    }

    echo $render;
}



}