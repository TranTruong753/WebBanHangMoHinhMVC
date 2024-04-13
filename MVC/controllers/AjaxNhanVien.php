<?php
    class AjaxNhanVien extends controller {
        public $NhanVienModel ;

        function __construct()
        {
            $this->NhanVienModel= $this->model("NhanVienModel");
        }

        public function getDanhSach(){
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
                    <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhanVienPage,".$row['MaNhanVien']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".$row["MaNhanVien"] ."'  >Xóa</a></pre>
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
            

              $tenNhanVien = $_POST["tenNhanVien"];
              $sdt = $_POST["sdt"];
              $cccd = $_POST["cccd"];
              $ngaySinh = $_POST["ngaySinh"];
              if($this->NhanVienModel->insert($tenNhanVien,$sdt,$cccd,$ngaySinh))
              {
                  echo "Thêm Dữ Liệu Thành Công!";
              }else echo "Thêm Dữ Liệu Thất Bại!";
      
              
          }



                
          
    }
?>