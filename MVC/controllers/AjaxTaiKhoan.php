<?php

class AjaxTaiKhoan extends controller {

    private $TaiKhoanModel;
    public function __construct() {
       $this->TaiKhoanModel = $this->model("TaiKhoanModel");
    }

    function DoiTrangThai(){
        $ma = $_POST["ma"];
        $trangThai =  $_POST["trangThai"];

        $this->TaiKhoanModel->updateTrangThai($ma,$trangThai);
    }

    public function getDanhSach(){
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
  
        $html="";
        
      
        if($this->TaiKhoanModel->getDanhSach($key,$pageIndex,$numberItem)->num_rows >0)
        {
            $result=$this->TaiKhoanModel->getDanhSach($key,$pageIndex,$numberItem);
            while($row = $result->fetch_assoc())
            {
              $html .=  " <tr>
              <td>".$row['MaTaiKhoan']."</td>
              <td>".$row['TenDangNhap']."</td>
              <td>".$row['MatKhau']."</td>
              <td>".$row['TenNhomQuyen']."</td>            
              <td>
                <label class='switch'>
                <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                  <input onchange='DoiTrangThaiNhanVien(this)' id='".$row['MaTaiKhoan']."' type='checkbox' value='1'";
                  if ($row["TrangThai"] == 1) {
                    $html .= "checked";
    
                  }
                  $html .=">
                  <span class='slider round'></span>
                </label>  
              </td>
              <td style='text-align: center;'>
              <!-- link  để chuyển sang trang nhóm quyền --> 
                <a class ='btn btn_delete' href='#' onclick='btnXoa(this)' id='".$row["MaTaiKhoan"] ."'  ><i class='bx bx-x'></i></a>              
                <a class ='btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaTaiKhoanPage,".$row['MaTaiKhoan']."'><i class='bx bxs-edit'></i></a>                              
              </td>
            </tr> ";
              
            }
  
            echo $html;
        }
        
      }

      public function insert(){
        $TenDangNhap = $_POST["TenDangNhap"];
        $MatKhau = $_POST["MatKhau"];
        $MaNhomQuyen = $_POST["MaNhomQuyen"];
        if($this->TaiKhoanModel->insert($TenDangNhap,$MatKhau,$MaNhomQuyen))
        {
          echo "1";
        }else{
          echo "0";
        }
      }

      public function update(){
        $MaTaiKhoan = $_POST["MaTaiKhoan"];
        $TenDangNhap = $_POST["TenDangNhap"];
        $MatKhau = $_POST["MatKhau"];
        $MaNhomQuyen = $_POST["MaNhomQuyen"];
        if($this->TaiKhoanModel->update($MaTaiKhoan,$TenDangNhap,$MatKhau,$MaNhomQuyen))
        {
          echo "1";
        }else{
          echo "0";
        }
      }

      public function delete()
    {
      //được xóa khi trang thái bằng 0 trong DB
        $ma = $_POST["ma"];


      
        if($this->TaiKhoanModel->delete($ma)==1){
          echo 'Xóa tài khoản Thành Công!';
        }else{
          echo 'Xóa tài khoản Thất bại!';
        }
   
      }

}

?>