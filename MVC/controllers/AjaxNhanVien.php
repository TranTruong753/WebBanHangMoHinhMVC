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
            <td>".$row['MaNhanVien']."</td>
            <td>".$row['TenNhanVien']."</td>
            <td>".$row['SoDienThoai']."</td>
            <td>".$row['CCCD']."</td>
            <td>".$row['NgaySinh']."</td>
            <td>
              <label class='switch'>
  
              <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                <input onchange='DoiTrangThaiNhanVien(this)' id='".$row['MaNhanVien']."' type='checkbox' value='1'";
                if ($row["TrangThai"] == 1) {
                  $html .= "checked";

                }
                $html .=">
                <span class='slider round'></span>
              </label>
              
            </td>
            <td>
            <!-- link  để chuyển sang trang nhóm quyền -->
              <div class ='btn-wrap'>
              <a class ='btn btn_delete' href='#' onclick='btnXoa(this)' id='".$row["MaNhanVien"] ."'  ><i class='bx bx-x'></i></a> 
              <a class ='btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhanVienPage,".$row['MaNhanVien']."'><i class='bx bxs-edit'></i></a> 
              ";
              if($this->NhanVienModel->kiemTraTaiKhoanNv($row['MaNhanVien'],$arr)==1){
                //http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaTaiKhoanPage,".$arr["MaTaiKhoan"]."
                $html .= "<a class = 'btn btn-account account-true' href='#!' id='".$row["MaNhanVien"]."'><i class='bx bxs-user-account'></i></a>";
              }
              else {
                $html .= "<a class = 'btn btn-account account-false'href='http://localhost/WebBanHangMoHinhMVC/Admin/default/CapTaiKhoanNhanVienPage,".$row["MaNhanVien"]."' id='".$row["MaNhanVien"]."'><i class='bx bxs-user-account'></i></a>";
              }
            $html .=" 
              </div>
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
      $arr = [];

      //nếu tìm thấy tài khoản của nv trong DB bằng 1 thì xóa tk
      if($this->NhanVienModel->kiemTraTaiKhoanNv($ma,$arr)==1) {
        $this->NhanVienModel->xoaTaiKhoanNv($ma);
      }


      if($this->NhanVienModel->delete($ma)==1){
        echo 'Xóa Nhân viên Thành Công!';
      }else{
        echo 'Xóa Nhân viên Thất bại!';
      }
  
   
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
