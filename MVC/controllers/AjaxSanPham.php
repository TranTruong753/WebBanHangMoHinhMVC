<?php

class AjaxSanPham extends controller {

    private $SanPhamModel;
    private $chitietspmodel;
    private $KhuyenMaiModel;
    private $ChiTietQuyenModel;
    public function __construct() {
       $this->SanPhamModel = $this->model("SanPhamModel");
       $this->chitietspmodel = $this->model("chitietspmodel");
       $this->KhuyenMaiModel = $this->model("KhuyenMaiModel");
       $this->ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
    }
    function InsertSP(){
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $gianhap = $_POST["gianhap"];
        $matheloai = $_POST["matheloai"];
        $machatlieu = $_POST["machatlieu"];
        $khuyenmai=$_POST["khuyenmai"];
        $result=$this->KhuyenMaiModel->getItemById($khuyenmai);
        $giasp=0;
        $giasp=(float)$gianhap*2-((float)$gianhap*(float)$result['MucKhuyenMai'])/100;
        //echo $masp." cc ".$tensp." ".$giasp." ".$matheloai." ".$machatlieu;
        //echo $giasp;
        if($this->SanPhamModel->InsertSP($masp,$tensp,$giasp,$gianhap,$matheloai,$machatlieu,$khuyenmai)){
            echo "true";
        }
        else echo "false";
        
    }
    function UpdateSP(){
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $gianhap = $_POST["gianhap"];
        $matheloai = $_POST["matheloai"];
        $machatlieu = $_POST["machatlieu"];
        $khuyenmai=$_POST["khuyenmai"];
        $result=$this->KhuyenMaiModel->getItemById($khuyenmai);
        $giasp=0;
        $giasp=(float)$gianhap*2-((float)$gianhap*(float)$result['MucKhuyenMai'])/100;
        echo $masp." cc ".$tensp." ".$giasp." ".$matheloai." ".$machatlieu;
        //echo $giasp;
        if($this->SanPhamModel->UpdateSPMoi($masp,$tensp,$giasp,$matheloai,$machatlieu,$khuyenmai)){
            echo "true";
        }
        else echo "false";
        
    }
    function DeleteSP(){
        $masp = $_POST["masp"];
        // $result= $this->chitietspmodel->GetCTSP($masp);
        // if ($result->num_rows == 0) {
            if($this->SanPhamModel->DeleteSP($masp)){
              $data=json_encode(["kq"=>true]);
              
            }
            else $data=json_encode(["kq"=>false]);
            echo $data;
            

        // }
        // else {
        //     $this->SanPhamModel->UpdateTTSP($masp);
        //     $data=json_encode(["kq"=>true]);
        //     echo $data;
        // }
            
         }
        
        // else echo "false";
        
    
    public function getDanhSach()
   {
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        $arrange= $_POST['arrange'];
        $properties=$_POST['properties'];
        $html="";
        
       
        if($this->SanPhamModel->GetAllDanhSach($key,$pageIndex,$numberItem,$arrange,$properties)->num_rows >0)
        {
            $result=$this->SanPhamModel->GetAllDanhSach($key,$pageIndex,$numberItem,$arrange,$properties);
            while($row = $result->fetch_assoc())
            {
              $html .=  '<tr> 
              <td>'.$row["MaSanPham"].'</td>
              <td>'.$row["TenSanPham"].'</td>
              <td>'.$row["GiaSanPham"].'</td>
              <td>'.$row["SoLuongTonSP"].'</td>
              <td>'.$row["GiaNhap"].'</td>
              <td>'.$row["TenKhuyenMai"].'-'.$row["MucKhuyenMai"].'%</td>
              <td>'.$row["TenTheLoai"].'</td>
              <td>'.$row["TenChatLieu"].'</td>
              <td>'.$row["TenThuongHieu"].'</td>
              <td>
              <label class="switch">
  
              <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                <input onchange="DoiTrangThaiSP(this)" id="'.$row['MaSanPham'].'" type="checkbox" value="1"';
                if ($row["TrangThaiSP"] == 1) {
                  $html .= "checked";

                }
                $html .='>
                <span class="slider round"></span>
              </label>
              
            </td>
              <td> ';
              if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION["MaNhomQuyen"],$_SESSION["Sản Phẩm"])==1)
              {
                $html.= ' <a  class = "btn btn_fix" href="http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaSanPhamPage,'.$row["MaSanPham"].'"><i class="bx bxs-edit"></i></a>';
              }

              if($this->ChiTietQuyenModel->KiemTraHanhDong("Xóa",$_SESSION["MaNhomQuyen"],$_SESSION["Sản Phẩm"])==1)
              {
                $html.='
                <button class = "btn btn_delete"   onclick="XoaSP(this)" id="'.$row["MaSanPham"].'"><i class="bx bx-x"></i></button> </br> ';
              }

              if($this->ChiTietQuyenModel->KiemTraHanhDong("Xem",$_SESSION["MaNhomQuyen"],$_SESSION["Sản Phẩm"])==1)
              {
                $html.='
                <a class = "btn btn_fix" href="http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietSanPhamPage,'.$row["MaSanPham"].'"><i class="bx bx-dots-horizontal-rounded"></i></a>';
              }
               $html.='
                
                
              </td>
            </tr>';
              
            }

            echo $html;
        }
        
   }

   public function getgianhap(){
    $masp=$_POST["masp"];
    $result=$this->SanPhamModel->GetSP($masp);
    if($result->num_rows >0){
        while($row = $result->fetch_assoc())
        {
            echo $row['GiaNhap'];
    }
   }
}
public function DoiTrangThai()
{
    $masp = $_POST['masp'];
    $trangThai = $_POST['trangThai'];
    $this->SanPhamModel->updateTrangThai($masp,$trangThai);
}

}

?>