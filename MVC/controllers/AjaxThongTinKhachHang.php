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
    else if($this->KhachHangModel->checkTrung($sdt,'SoDienThoai')){
      $checkSdt = true; 
    }
    else if(!$this->KhachHangModel->checkTrung($sdt,'SoDienThoai')){
      $checkSdt = false;
      echo '-1';
    }
    else if($this->KhachHangModel->checkTrung($maKhachHang,'MaKhachHang')){
      $checkMa = true; 
    }
    else{
      $checkMa = false;
      echo '-2';
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
      //được xóa khi trang thái bằng 0 trong DB
      $ma = $_POST["ma"];
      // $checkTrangThai  = true ;
      //nếu tìm thấy trạng thái trong DB bằng 1 thì $checkTrangThai = false
      // if($this->KhachHangModel->kiemTraTrangThai($ma) == 1) $checkTrangThai = false;
      //echo $this->KhachHangModel->kiemTraTrangThai($ma);
      // if($checkTrangThai == true)
      // {
      //   if($this->KhachHangModel->delete($ma)==1) echo 'Xóa Khách hàng Thành Công!';
      //   else echo 'Xóa Khách hàng Thất Bại!';
      // }
      //   else echo "Khách hàng Đã Được Sử Dụng";

      if($this->KhachHangModel->delete($ma)==1) echo 'Xóa Khách hàng Thành Công!';
      else echo 'Xóa Khách hàng Thất Bại!';
    }


    public function getDanhSach(){
      $key = $_POST['key'];
      $pageIndex = $_POST['index'];
      $numberItem = $_POST['size'];

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
              <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaKhachHangPage,".$row['MaKhachHang']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".$row["MaKhachHang"] ."'  >Xóa</a></pre>
            </td>
          </tr> ";
            
          }

          echo $html;
      }
      
    }    

    
}
?>