<?php 
class AjaxThongTinKhachHang extends controller {
    public $KhachHangModel ;

    function __construct()
    {
        $this->KhachHangModel= $this->model("KhachHangModel");
    }

    public function DoiTrangThai()
    {
        $ma = $_POST['ma'];
        $trangThai = $_POST['trangThai'];
        $this->KhachHangModel->updateTrangThai($ma,$trangThai);
    }



// form khách hàng
    function updateKh(){
        $makh=$_POST['makh'];
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $gioitinh=$_POST['gioitinh'];
        if($this->KhachHangModel->updateKh($makh,$sdt,$ten,$gioitinh)==true){
            $_SESSION['Ten']=$ten;
            echo 'true';
        }
        else {
            echo 'false';
        }
    }

    // form admin

    public function update(){
      $checkSdt = false;
      $maKhachHang = $_POST["maKhachHang"];
      $tenKhachHang = $_POST["tenKhachHang"];
      $sdt = $_POST["sdt"];
      $gioitinh = $_POST["gioitinh"];
      if($this->KhachHangModel->checkSdtTrung($sdt,$maKhachHang)){
        $checkSdt = true;
        
      }else{
        $checkSdt = false;
        echo '-1';
      }
      if($checkSdt){
        if($this->KhachHangModel->updateKh($maKhachHang, $sdt, $tenKhachHang, $gioitinh))
        {
            echo "1";
        }else echo "0";     
      }
  }

  public function insert(){
    $checkMa = false;
    $checkSdt = false;
    $maKhachHang = $_POST["maKhachHang"];
    $tenKhachHang = $_POST["tenKhachHang"];
    $sdt = $_POST["sdt"];
    $gioitinh = $_POST["gioitinh"];

    if(!$this->KhachHangModel->checkTrung($sdt,'SoDienThoai')&&!$this->KhachHangModel->checkTrung($maKhachHang,'MaKhachHang')){
        echo '-3';
        $checkMa = false;
        $checkSdt = false;
    }
    else if($this->KhachHangModel->checkTrung($sdt,'SoDienThoai')&&$this->KhachHangModel->checkTrung($maKhachHang,'MaKhachHang')){
      $checkMa = true;
      $checkSdt = true;
    }
    else if($this->KhachHangModel->checkTrung($sdt,'SoDienThoai')&&!$this->KhachHangModel->checkTrung($maKhachHang,'MaKhachHang')){
      $checkSdt = true;
      $checkMa = false;
      echo '-2'; 
    }
    else if(!$this->KhachHangModel->checkTrung($sdt,'SoDienThoai')&&$this->KhachHangModel->checkTrung($maKhachHang,'MaKhachHang')){
      $checkSdt = false;
      $checkMa = true; 
      echo '-1';
    }
 
    if($checkSdt&&$checkMa){
      if($this->KhachHangModel->insertKh($maKhachHang, $sdt, $tenKhachHang, $gioitinh))
      {
          echo "1";
      }else echo "0";     
    }
  }

    public function XoaDuLieuKhachHang()
    {
    
      $ma = $_POST["ma"];
      $arr = [];
     
      //nếu tìm thấy trạng thái trong DB bằng 1 thì xóa tk
      if($this->KhachHangModel->kiemTraTrangThai($ma,$arr) == 1){
        $this->KhachHangModel->xoaTaiKhoanKh($ma);
      }
    

      if($this->KhachHangModel->delete($ma)==1) echo 'Xóa Khách hàng Thành Công!';
      else echo 'Xóa Khách hàng Thất Bại!';
    }


    public function getDanhSach(){
      $key = $_POST['key'];
      $pageIndex = $_POST['index'];
      $numberItem = $_POST['size'];
      $arr = [];
      $html="";
      
    
      if($this->KhachHangModel->getDanhSach($key,$pageIndex,$numberItem)->num_rows >0)
      {
          $result=$this->KhachHangModel->getDanhSach($key,$pageIndex,$numberItem);
          while($row = $result->fetch_assoc())
          {
            $html .=  " <tr>
            <th style='text-align: center;' scope='row'>".$row['MaKhachHang']."</th>
            <td style='text-align: center;'>".$row['TenKhachHang']."</td>
            <td style='text-align: center;'>".$row['SoDienThoai']."</td>
            <td style='text-align: center;'>".$row['GioiTinh']."</td>
            <td style='text-align: center;'>
  
            <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
              <input onchange='DoiTrangThaiKhachHang(this)' id='".$row['MaKhachHang']."' type='checkbox' value='1'";
              if ($row["TrangThai"] == 1) {
                $html .= "checked";

              }
              $html .="
              
            </td>
            <td style='text-align: center;'>
            <!-- link  để chuyển sang trang nhóm quyền -->
            <a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaKhachHangPage,".$row['MaKhachHang']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".$row["MaKhachHang"] ."'  >Xóa</a>| 
            ";
            if($this->KhachHangModel->kiemTraTaiKhoanKh($row['MaKhachHang'],$arr)==1){
              $html .= "<a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaTaiKhoanPage,".$arr["MaTaiKhoan"]."' id='".$row["MaKhachHang"]."'>Sửa tài khoản</a>";
            }
            else {
              $html .= "<a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/CapTaiKhoanKhachHangPage,".$row["MaKhachHang"]."' id='".$row["MaKhachHang"]."'>Cấp tài khoản</a>";
            }
          $html .="
          </td>
        </tr> ";
            
          }
          

          echo $html;
      }
      
    }    

    
}
?>