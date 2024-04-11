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
                    <input onchange='DoiTrangThaiKhachHang(this)' id='".$row['MaNhanVien']."' type='checkbox' value='1'";
                    if ($row["TrangThai"] == 1) {
                      $html .= "checked";
      
                    }
                    $html .="
                    
                  </td>
                  <td style='text-align: center;'>
                  <!-- link  để chuyển sang trang nhóm quyền -->
                    <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaKhachHangPage,".$row['MaNhanVien']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".$row["MaNhanVien"] ."'  >Xóa</a></pre>
                  </td>
                </tr> ";
                  
                }
      
                echo $html;
            }
            
          }    
    }
?>