<?php
    class AjaxNhanVien extends controller {
  public $NhanVienModel ;

    function __construct()
    {
        $this->NhanVienModel= $this->model("NhanVienModel");
    }

  public function getDanhSach(){
      $arr = [];
      $key = $_POST['key'];
      $pageIndex = $_POST['index'];
      $numberItem = $_POST['size'];

      $html="";
      
    
      if($this->NhanVienModel->getDanhSach($key,$pageIndex,$numberItem)->num_rows >0)
      {
          $result=$this->NhanVienModel->getDanhSach($key,$pageIndex,$numberItem);
          while($row = $result->fetch_assoc())
          {
            $html .=  " <tr>
            <th style='text-align: center;' scope='row'>".$row['MaNhanVien']."</th>
            <td style='text-align: center;'>".$row['TenNhanVien']."</td>
            <td style='text-align: center;'>".$row['SoDienThoai']."</td>
            <td style='text-align: center;'>".$row['CCCD']."</td>
            <td style='text-align: center;'>".$row['NgaySinh']."</td>
            <td style='text-align: center;'>
  
            <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
              <input onchange='DoiTrangThaiNhanVien(this)' id='".$row['MaNhanVien']."' type='checkbox' value='1'";
              if ($row["TrangThai"] == 1) {
                $html .= "checked";

              }
              $html .="
              
            </td>
            <td style='text-align: center;'>
            <!-- link  để chuyển sang trang nhóm quyền -->
              <a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhanVienPage,".$row['MaNhanVien']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".$row["MaNhanVien"] ."'  >Xóa</a>| 
              ";
              if($this->NhanVienModel->kiemTraTaiKhoanNv($row['MaNhanVien'],$arr)==1){
                $html .= "<a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaTaiKhoanPage,".$arr["MaTaiKhoan"]."' id='".$row["MaNhanVien"]."'>Sửa tài khoản</a>";
              }
              else {
                $html .= "<a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/CapTaiKhoanPage,".$row["MaNhanVien"]."' id='".$row["MaNhanVien"]."'>Cấp tài khoản</a>";
              }
            $html .="
            </td>
          </tr> ";
            
          }

          echo $html;
      }
      
    }

    public function XoaDuLieuNhanVien()
    {
      //được xóa khi trang thái bằng 0 trong DB
      $ma = $_POST["ma"];
      // $checkTk  = false ;
      //nếu tìm thấy tài khoản của nv trong DB bằng 1 thì $checkTk = true
      //if($this->NhanVienModel->kiemTraTaiKhoanNv($ma)==1) $checkTk = true;

    
      if($this->NhanVienModel->delete($ma)==1){
        echo 'Xóa Nhân viên Thành Công!';
      }else{
        echo 'Xóa Nhân viên Thất bại!';
      }
      //echo $this->KhachHangModel->kiemTraTrangThai($ma);
    //   if($checkTrangThai == true)
    //   {
    //     if($this->NhanVienModel->delete($ma)==1) echo 'Xóa Khách hàng Thành Công!';
    //     else echo 'Xóa Khách hàng Thất Bại!';
    //   }
    //     else echo "Khách hàng Đã Được Sử Dụng";
      }

      public function DoiTrangThai()
    {
        $ma = $_POST['ma'];
        $trangThai = $_POST['trangThai'];
        $this->NhanVienModel->updateTrangThai($ma,$trangThai);
    }

    public function insert()
    {
        $checkSdt = false;
        $checkCCCD = false;
        $tenNhanVien = $_POST["tenNhanVien"];
        $sdt = $_POST["sdt"];
        $cccd = $_POST["cccd"];
        $ngaySinh = $_POST["ngaySinh"];
        if(!$this->NhanVienModel->checkTrung($sdt,'SoDienThoai')&&!$this->NhanVienModel->checkTrung($cccd,'CCCD')){
          echo '-3';
          $checkSdt = false;
          $checkCCCD = false;
        }
        else if($this->NhanVienModel->checkTrung($sdt,'SoDienThoai')&&$this->NhanVienModel->checkTrung($cccd,'CCCD')){
          $checkSdt = true;
          $checkCCCD = true;
        }
        else if($this->NhanVienModel->checkTrung($sdt,'SoDienThoai')&&!$this->NhanVienModel->checkTrung($cccd,'CCCD')){
          $checkSdt = true;
          echo '-2';
          $checkCCCD = false;
        }
        else if(!$this->NhanVienModel->checkTrung($sdt,'SoDienThoai')&&$this->NhanVienModel->checkTrung($cccd,'CCCD')){
          echo '-1';
          $checkCCCD = true;
          $checkSdt = false;
        }
        if($checkSdt&&$checkCCCD){
           if($this->NhanVienModel->insert($tenNhanVien,$sdt,$cccd,$ngaySinh))
            {
                echo "1";
            }else{
              echo "0";
            }
        }
       
                
    }

    public function update(){
        $checkSdt = false;
        $checkCCCD = false;
        $maNhanVien = $_POST["maNhanVien"];
        $tenNhanVien = $_POST["tenNhanVien"];
        $sdt = $_POST["sdt"];
        $cccd = $_POST["cccd"];
        $ngaySinh = $_POST["ngaySinh"];
        if(!$this->NhanVienModel->checkSdtTrung($sdt,$maNhanVien)&&!$this->NhanVienModel->checkCccdTrung($cccd,$maNhanVien)){
          echo '-3';
          $checkSdt = false;
          $checkCCCD = false;
        }
        else if($this->NhanVienModel->checkSdtTrung($sdt,$maNhanVien)&&$this->NhanVienModel->checkCccdTrung($cccd,$maNhanVien)){
          $checkSdt = true;
          $checkCCCD = true;
        }
        else if($this->NhanVienModel->checkSdtTrung($sdt,$maNhanVien)&&!$this->NhanVienModel->checkCccdTrung($cccd,$maNhanVien)){
          $checkSdt = true;
          $checkCCCD = false;   
          echo '-2';
          
        }else if(!$this->NhanVienModel->checkSdtTrung($sdt,$maNhanVien)&&$this->NhanVienModel->checkCccdTrung($cccd,$maNhanVien)){
          $checkSdt = false;
          $checkCCCD = true;
          echo '-1';
        }
       

        if($checkCCCD&&$checkSdt){
          if($this->NhanVienModel->update($maNhanVien,$tenNhanVien,$sdt,$cccd,$ngaySinh))
          {
              echo "1";
          }else echo "0";     
        }

        

    }



                
          
    }
?>
