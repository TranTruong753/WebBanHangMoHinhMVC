<?php 
    class AjaxThongTinKhachHang extends controller {
        public $KhachHangModel ;

        function __construct()
        {
            $this->KhachHangModel= $this->model("KhachHangModel");
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

        public function getDanhSach()
   {
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
                <input onchange='DoiTrangThaiNhomQuyen(this)' id='".$row['MaNhomQuyen']."' type='checkbox' value='1'";
                if ($row["TrangThai"] == 1) {
                  $html .= "checked = 'checked'";

                }
                $html .="
                
              </td>
              <td style='text-align: center;'>
              <!-- link  để chuyển sang trang nhóm quyền -->
                <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhomQuyenPage,".$row['MaNhomQuyen']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".  $row["MaNhomQuyen"] ."'  >Xóa</a></pre>
              </td>
            </tr> ";
              
            }

            echo $html;
        }
        
   }    

       
    }
?>