<?php

class AjaxSanPham extends controller {

    private $SanPhamModel;
    private $chitietspmodel;
    public function __construct() {
       $this->SanPhamModel = $this->model("SanPhamModel");
       $this->chitietspmodel = $this->model("chitietspmodel");

    }
    function InsertSP(){
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $giasp = $_POST["giasp"];
        $matheloai = $_POST["matheloai"];
        $machatlieu = $_POST["machatlieu"];
        //echo $masp." cc ".$tensp." ".$giasp." ".$matheloai." ".$machatlieu;
        if($this->SanPhamModel->InsertSP($masp,$tensp,$giasp,$matheloai,$machatlieu)){
            echo "true";
        }
        else echo "false";
        
    }
    function DeleteSP(){
        $masp = $_POST["masp"];
        $result= $this->chitietspmodel->GetCTSP($masp);
        if ($result->num_rows == 0) {
            $this->SanPhamModel->DeleteSP($masp);
            $data=json_encode(["kq"=>true]);
            echo $data;

        }
        else {
            $this->SanPhamModel->UpdateTTSP($masp);
            $data=json_encode(["kq"=>true]);
            echo $data;
        }
            
        }
        
        // else echo "false";
        
    
    public function getDanhSach()
   {
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];

        $html="";
        
       
        if($this->SanPhamModel->GetAllDanhSach($key,$pageIndex,$numberItem)->num_rows >0)
        {
            $result=$this->SanPhamModel->GetAllDanhSach($key,$pageIndex,$numberItem);
            while($row = $result->fetch_assoc())
            {
              $html .=  '<tr> 
              <th style="text-align: center;" scope="row">'.$row["MaSanPham"].'</th>
              <td style="text-align: center;">'.$row["TenSanPham"].'</td>
              <td style="text-align: center;">'.$row["GiaSanPham"].'</td>
              <td style="text-align: center;">'.$row["SoLuongTonSP"].'</td>
              <td style="text-align: center;">'.$row["GiaNhap"].'</td>
              <td style="text-align: center;">'.$row["TenTheLoai"].'</td>
              <td style="text-align: center;">'.$row["TenChatLieu"].'</td>
              <td style="text-align: center;">'.$row["TenThuongHieu"].'</td>
              <td style="text-align: center;"><pre><a href="">Sửa</a> | <button  onclick="XoaSP(this)" id="'.$row["MaSanPham"].'">Xóa</button> | 
              <br> <a href="http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietSanPhamPage,'.$row["MaSanPham"].'">Sản Phẩm Con</a> </pre></td>
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

}

?>