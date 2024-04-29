<?php 

class AjaxChucNang extends controller {

    private $ChucNangModel;
    private $ChiTietQuyenModel;
    private $NhomQuyenModel;
    public function __construct() {
        $this->ChucNangModel = $this->model("ChucNangModel");
        $this->ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
        $this->NhomQuyenModel = $this->model("NhomQuyenModel");
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
        if($this->ChucNangModel->KiemTraTonTaiQuaTen($tenChucNang)==0)
        {
            if($this->ChucNangModel->insert($tenChucNang,$trangThai) == 1)
            {
                echo 1;
            }else echo 0;
        }else echo -1;
       
    }

    public function SuaDuLieu()
    {
        $maChucNang = $_POST["MaChucNang"];
        $tenChucNang = $_POST["TenChucNang"];
        if($this->ChucNangModel->KiemTraTonTaiQuaTen($tenChucNang)==0)
        {
            if($this->ChucNangModel->update($maChucNang,$tenChucNang) == 1)
            {
                echo 1;
            }else echo 0;
        }else echo -1;
       
    }

    public function XoaDuLieu()
    {
        $maChucNang = $_POST["MaChucNang"];
        if($this->ChucNangModel->KiemTraChiTietQuyenSuDung($maChucNang)==0)
        {
            if($this->ChucNangModel->delete($maChucNang) == 1)
            {
                echo 1;
            }else echo 0;
        }else echo -1;
       
    }


    public function TimKiemQuaTen() {
        $tenChucNang = $_POST["TenChucNang"];
        if($this->ChucNangModel->TimKiemQuaTen($tenChucNang) == 1)
        {
            echo 1 ;
        }
        else echo 0;
    }

    

    public function getSidebar()
    {
        $result = $this->ChucNangModel->getDanhSachCoTrangThai();
        $json = "[";
        $count = $result->num_rows;
        // $MaNhomQuyen = $this->NhomQuyenModel->getMaNhomQuyenQuaTenDangNhap($_SESSION('email'));
        // $MaNhomQuyen = 3;
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
               if($this->ChucNangModel->KiemTraChucNang($_SESSION['MaNhomQuyen'],$row["MaChucNang"])==1)
               {
                $json .= '"'.$row['TenChucNang'].'"';
                    $json .= ",";
               }
            }
           
        }
        $json = substr($json, 0, -1);
        $json .= ']';
        echo $json;
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
            <pre><a href='http://localhost/WebBanHangMoHinhMVC/admin/default/SuaChucNangPage,".$row["MaChucNang"]."'>Sửa</a> | <a href='' onclick='btnXoa(this)' id='".$row["MaChucNang"]."'>Xóa</a></pre>
          </td>
        </tr>
            ";
        }
    }

    echo $render;
}



}