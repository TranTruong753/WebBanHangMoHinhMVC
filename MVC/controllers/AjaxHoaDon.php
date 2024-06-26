
<?php
class AjaxHoaDon extends controller{
    public $HoaDonModel;
    private $chitietspmodel;
    private $ChiTietHoaDonModel;
    private $ChiTietQuyenModel;
    private $SanPhamModel;
    public function __construct(){
       $this->HoaDonModel= $this->model("HoaDonModel");
       $this->chitietspmodel = $this->model("chitietspmodel");
       $this->ChiTietHoaDonModel= $this->model("ChiTietHoaDonModel");
       $this->SanPhamModel=$this->model("SanPhamModel");
       $this->ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        if($trangThai==-1){
          $result=$this->ChiTietHoaDonModel->GetCTSPHD($ma);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $sltonctsp=$row['SoLuongTon']+$row['SoLuong'];
                    $sltonsp=$row['SoLuongTonSP']+$row['SoLuong'];
                    $this->chitietspmodel->UpdateCTSP($row['MaChiTietSanPham'],$sltonctsp);
                    $this->SanPhamModel->UpdateSP($row['MaSanPham'],$sltonsp);
                }
            }
        }
        $this->HoaDonModel->updateTrangThai($ma,$trangThai);
    }

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

    public function getDanhSachThongKeTrong1KhoangThoiGian()
    {
      $top = $_POST['top'];
      $start = $_POST['start'];
      $end = $_POST['end'];

      $result = $this->HoaDonModel->getDanhSachHoaDonTrong1KhoangThoiGian($top,$start,$end);

      $render = "[";
      for($i = 0 ; $i < count($result);$i++)
      {
        $render.= '["'.$result[$i][0].'",'.$result[$i][1].']';
        if($i!= count($result)-1) $render.=",";
      }
      $render.="]";
      // print_r('render'.$render);
      echo $render;
    }


    public function getThongKeTrong1Nam()
    {
      // $month = $_POST['month'];
      $year = $_POST['year'];
      $render = "";
      for($i = 1; $i <= 12; $i++ )
      {
        $total = $this->HoaDonModel->getDoanhThuTrong1Thang($i,$year);
        if($i!= 12 && $total != "") $render.=",";
        if($total!="")
        {
          $render.='["Tháng '.$i.'",'.$total.']';

        }
        
      }
      $render =trim($render,',');
      $render ="[". $render.']';
      echo $render;
    }


    public function getThongKeTrong1Thang()
    {
      $month = $_POST['month'];
      $year = $_POST['year'];
      $end = $month*4;
      $start = $end-4+1;
      $render = "";
      for($i =  $start; $i <= $end; $i++ )
      {
        $total = $this->HoaDonModel->getDoanhThuTrong1Tuan($i,$month,$year);
        if( $total != "") $render.=",";
        else if($total == "") $render.=',["Tuần '.$i.'",0]';
        if($total!="")
        {
          $render.='["Tuần '.$i.'",'.$total.']';

        }
        
      }
      $render =trim($render,',');
      $render ="[". $render.']';
      echo $render;
    }

    public function getDanhSachHD()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->HoaDonModel->getDSHD($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->HoaDonModel->getDSHD($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " <tr>
               <td>".$row['MaHoaDon']."</td>
               <td>".$row['NgayLap']."</td>
               <td>".$row['TongTien']."</td>
               <td>".$row['HinhThucThanhToan']."</td>
              
               <td>".$row['MaKhachHang']."</td>
               <td>".$row['SoDienThoai']."</td>
               <td>".$row['DiaChi']."</td>
              
               <td>".$row['MaNhanVien']."</td>
               <td>
              
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
               <!--<div class='radio-wrap radio-wrap_flex'> -->
                 <input onchange='DoiTrangThaiHoaDon(this)' id='".$row['MaHoaDon']."' class= 'single-checkbox add-form__raido-input' type='radio' value='1' ";
                 if ($row["TrangThai"] == 1) {
                     $html .= " checked='checked'";
                 }
                 $html .= "> 
                 <!--  <label class='add-form__radio-label' for='".$row['MaHoaDon']."1'
                    ><span class='add-form__raido-span'></span>                    
                  </label>
               </div>     -->       
           
                 
               </td>
               <td>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
               <!--<div class = 'radio-wrap radio-wrap_flex'> -->
                 <input onchange='DoiTrangThaiHoaDon(this)' id='".$row['MaHoaDon']."' class= 'single-checkbox add-form__raido-input' type='radio' value='2' ";
                 if ($row["TrangThai"] == 2) {
                     $html .= " checked='checked'";
                 }
                 $html .= ">
                 <!--   <label class='add-form__radio-label' for='".$row['MaHoaDon']."2'
                    ><span class='add-form__raido-span'></span>                    
                  </label>   
              </div>     -->     
               
                 
               </td>
               <td>
               <!-- <div class = 'radio-wrap radio-wrap_flex'> -->
                 <input onchange='DoiTrangThaiHoaDon(this)' id='".$row['MaHoaDon']."' class= 'single-checkbox' type='radio' value='-1' ";
                 if ($row["TrangThai"] == -1) {
                     $html .= " checked='checked'";
                 }
                 $html .= ">
                <!-- <label class='add-form__radio-label' for='".$row['MaHoaDon']."3'
                    ><span class='add-form__raido-span'></span>                    
                  </label>
               </div> -->
                 
               </td>
               <td>
               <!-- link  để chuyển sang trang nhóm quyền -->";
               
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Xem",$_SESSION["MaNhomQuyen"],$_SESSION["Hóa Đơn"])==1)
               {
                 $html.= "<a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietHoaDonPage,".$row['MaHoaDon']."' title = 'chi tiết'><i class='bx bx-dots-horizontal-rounded'></i></a>";
               }
                 
               $html.="
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>
