
<?php
class AjaxHoaDon extends controller{
    public $HoaDonModel;
    public function __construct(){
       $this->HoaDonModel= $this->model("HoaDonModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->HoaDonModel->updateTrangThai($ma,$trangThai);
    }

    // public function InsertNCC(){
    //     $tenncc=$_POST["tenncc"];
    //     $sdt=$_POST["sdt"];
    //     $dc=$_POST["dc"];
    //     if($this->NhaCungCapModel->InsertNCC($tenncc,$sdt,$dc)){
    //         echo "true";
    //     }
    //     else echo "false";
    // }

    // public function UpdateNCC(){
    //     $mancc=$_POST["mancc"];
    //     $tenncc=$_POST["tenncc"];
    //     $sdt=$_POST["sdt"];
    //     $dc=$_POST["dc"];
    //     if($this->NhaCungCapModel->UpdateNCC($mancc,$tenncc,$sdt,$dc)){
    //         echo "true";
    //     }
    //     else echo "false";   
    // }

    public function getDanhSachThongKeTrong1Thang() {
      $result = $this->HoaDonModel->getDanhSachHoaDonTrong1Thang();
      $render = '[["Sản Phẩm","Số Lượng"],';
      for($i = 0 ; $i < count($result);$i++)
      {
        $render.= '["'.$result[$i][0].'",'.$result[$i][1].']';
        if($i!= count($result)-1) $render.=",";
      }
      $render.="]";
      echo $render;
      
      
    }
    public function getDanhSachHD()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->HoaDonModel->GetAllHoaDon($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->HoaDonModel->GetAllHoaDon($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " <tr>
               <th style='text-align: center;' scope='row'>".$row['MaHoaDon']."</th>
               <td style='text-align: center;'>".$row['NgayLap']."</td>
               <td style='text-align: center;'>".$row['TongTien']."</td>
               <td style='text-align: center;'>".$row['HinhThucThanhToan']."</td>
               <td style='text-align: center;'>".$row['MaThue']."</td>
               <td style='text-align: center;'>".$row['MaKhachHang']."</td>
               <td style='text-align: center;'>".$row['SoDienThoai']."</td>
               <td style='text-align: center;'>".$row['DiaChi']."</td>
               <td style='text-align: center;'>".$row['MaKhuyenMai']."</td>
               <td style='text-align: center;'>".$row['MaNhanVien']."</td>
               <td style='text-align: center;'>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
               <input onchange='DoiTrangThaiHoaDon(this)' id='".$row['MaHoaDon']."' class= 'single-checkbox' type='checkbox' value='1'";
               if ($row["TrangThai"] == 1) {
                   $html .= " checked='checked'";
               }
               $html .= ">";              
                 $html .="
                 
               </td>
               <td style='text-align: center;'>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
               <input onchange='DoiTrangThaiHoaDon(this)' id='".$row['MaHoaDon']."' class= 'single-checkbox' type='checkbox' value='2'";
               if ($row["TrangThai"] == 2) {
                   $html .= " checked='checked'";
               }
               $html .= ">";              
                 $html .="
                 
               </td>
               <td style='text-align: center;'>
               <!-- link  để chuyển sang trang nhóm quyền -->
                 <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaHoaDonPage,".$row['MaHoaDon']."'>Chi tiết</a></pre>
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>
