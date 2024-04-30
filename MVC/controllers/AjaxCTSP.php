<?php

class AjaxCTSP extends controller {

    private $GioHangModel;
    private $chitietspmodel;
    public function __construct() {
       $this->GioHangModel = $this->model("GioHangModel");
       $this->chitietspmodel = $this->model("chitietspmodel");

    }
    function LoadImg(){
        // $ten=$_POST['tensanpham'];
        $file=$_FILES;
        $filepath='public\img\\';       
        move_uploaded_file($file['file']['tmp_name'], $filepath.$file['file']['name']);
        $fileurl=$file['file']['name'];
        $data= json_encode(['success'=>"true",'src'=>$fileurl]);
        echo $data; 
    }

    function InsertCTSP(){
        $mactsp = $_POST["mactsp"];
        $masp = $_POST["masp"];
        $mamausac = $_POST["mamausac"];
        $makichco = $_POST["makichco"];
        $hinhanh = $_POST["hinhanh"];
        $result=$this->GioHangModel->TimkiemCTSP($masp,$mamausac,$makichco);
        $t='';
        if($result->num_rows >0){
            //echo "Chi tiet san pham da ton tai";
            $data=json_encode(["kq"=>false,"echo"=>$t]);
            echo $data;
        }
        else{
           if( $this->chitietspmodel->InsertCTSP($mactsp,$masp,$mamausac,$makichco,$hinhanh)){
            //echo "them thanh cong";
            
            $resultctsp=$this->chitietspmodel->GetCTSP($masp);
            $t=$t.'<table class="table">
            <style></style>
            <div style="text-align: center;">
            <h1 >Quản Lý Sản Phẩm</h1>
            </div>
              <thead>
                <tr>
                  <th scope="col" style="text-align: center;">Hình ảnh</th>
                  <th scope="col" style="text-align: center;">ID</th>
                  <th scope="col" style="text-align: center;">Tên</th>
                  <th scope="col" style="text-align: center;">Màu sắc</th>
                  <th scope="col" style="text-align: center;">Kích cở</th>
                  <th scope="col" style="text-align: center;">Số lượng tồn</th>
                  
                </tr>
              </thead>
              
              <tbody class="table-group-divider">';
            if($resultctsp->num_rows > 0)
            {
              while($row = $resultctsp->fetch_assoc())
              {
                $t=$t.'
             <tr> 
                  <th style="text-align: center;" scope="row">
                    <img weight= 300px height=400px src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'" alt="">
                  </th>
                  <th style="text-align: center;" scope="row">'. $row["MaChiTietSanPham"].'</th>
                  <td style="text-align: center;">'.$row["TenSanPham"].'</td>
                  <td style="text-align: center;">'. $row["TenMauSac"].'</td>
                  <td style="text-align: center;">'. $row["TenKichCo"].'</td>
                  <td style="text-align: center;">'. $row["SoLuongTon"].'</td>
                  <td>
              
                  
                </tr>';
              }
            }
            $t=$t.'
              </tbody>
              </table>';
           }
           else $t= "them that bai";
           $data=json_encode(["kq"=>true,"echo"=>$t]);
            echo $data;
        }
        
    }
    function DeleteCTSP(){
        $mactsp = $_POST["mactsp"];
        // $result=$this->chitietspmodel->GettheoMactsp($mactsp);
        // if($result->num_rows >0){
        //   while($row = $result->fetch_assoc()){
        //     if($row['SoLuongNhap']>0){
        //       if($this->chitietspmodel->UpdateTTCTSP($mactsp)){
        //         $data=json_encode(["kq"=>true,"sl"=>$row['SoLuongNhap']]);
        //         echo $data;
        //       }
        //       else {
        //         $data=json_encode(["kq"=>false]);
        //         echo $data;
        //       }
        //     }
        //     else {
              if($this->chitietspmodel->DeleteCTSP($mactsp)){
                $data=json_encode(["kq"=>true]);
                echo $data;
          //     }
          //     else {
          //       $data=json_encode(["kq"=>false,"sl"=>"cc"]);
          //       echo $data;
          //     }
          //   }

           }
        }
      
        // else echo "false";
        
    
    function UpdateCTSP(){
      $mactsp = $_POST["mactsp"];
      $masp = $_POST["masp"];
      $mamausac = $_POST["mamausac"];
      $makichco = $_POST["makichco"];
      $hinhanh = $_POST["hinhanh"];
      $result=$this->GioHangModel->TimkiemCTSP($masp,$mamausac,$makichco);
        
        if($result->num_rows >0){
            //echo "Chi tiet san pham da ton tai";
            $data=json_encode(["kq"=>false,"echo"=>"Chi tiết sản phẩm bị trùng"]);
            echo $data;
        }
          else
            if($this->chitietspmodel->UpdateAllCTSP($mactsp,$makichco,$mamausac,$hinhanh)){
                  $data=json_encode(["kq"=>true,"echo"=>"Update thành công"]);
                  echo $data;
            }
            else {$data=json_encode(["kq"=>false,"echo"=>"Update thất bại"]);
                  echo $data;
            }
    }
    public function getDanhSach()
   {
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        $masp=$_POST['masp'];

        $html="";
        
       
        if($this->chitietspmodel->getDanhSach($key,$pageIndex,$numberItem,$masp)->num_rows >0)
        {
            $result=$this->chitietspmodel->getDanhSach($key,$pageIndex,$numberItem,$masp);
            while($row = $result->fetch_assoc())
            {
              $html .=  '<tr id="'.$row["MaChiTietSanPham"].'" onclick="loadID(this)"> 
              <th style="text-align: center;" scope="row">
                <img weight= 300px height=400px  src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row["HinhAnh"].'" alt="">
              </th>
              <th style="text-align: center;" scope="row">'.$row["MaChiTietSanPham"].'</th>
              <td style="text-align: center;">'.$row["TenSanPham"].'</td>
              <td style="text-align: center;">'.$row["TenMauSac"].'</td>
              <td style="text-align: center;">'.$row["TenKichCo"].'</td>
              <td style="text-align: center;">'.$row["SoLuongTon"].'</td>
              <td>
              <label class="switch">
  
              <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                <input onchange="DoiTrangThaiCTSP(this)" id="trangthai'.$row['MaChiTietSanPham'].'" value="'.$row['MaChiTietSanPham'].'" type="checkbox" value="1"';
                if ($row["TrangThaiCTSP"] == 1) {
                  $html .= "checked";

                }
                $html .='>
                <span class="slider round"></span>
              </label>
              
            </td>
              <td style="text-align: center;"><pre><a href="http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaChiTietSanPhamPage,'.$row["MaChiTietSanPham"].'">Sửa</a>|
               <button  onclick="DeleteCTSP(this)" id="'.$row["MaChiTietSanPham"].'">Xóa</button> | 
              <br> </pre></td>
              
            </tr>';
              
            }

            echo $html;
        }
        
   }
   public function DoiTrangThai()
{
    $mactsp = $_POST['mactsp'];
    $trangThai = $_POST['trangThai'];
    $this->chitietspmodel->updateTrangThai($mactsp,$trangThai);
}

}

?>