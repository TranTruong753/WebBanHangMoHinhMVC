<?php

class AjaxPhieuNhap extends controller {

    private $SanPhamModel;
    private $chitietspmodel;
    private $PhieuNhapModel;
    private $ChiTietPhieuNhapModel;
    private $ChiTietQuyenModel;
    public function __construct() {
       $this->SanPhamModel = $this->model("SanPhamModel");
       $this->chitietspmodel = $this->model("chitietspmodel");
       $this->PhieuNhapModel = $this->model("PhieuNhapModel");
       $this->ChiTietPhieuNhapModel = $this->model("ChiTietPhieuNhapModel");
       $this->ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
    }
    
    public function getDanhSach()
   {
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        $arrange= $_POST['arrange'];
        $properties=$_POST['properties'];

        $html="";
        if($this->PhieuNhapModel->getDanhSach($key,$pageIndex,$numberItem,$arrange,$properties)->num_rows >0)
        {
            $result=$this->PhieuNhapModel->getDanhSach($key,$pageIndex,$numberItem,$arrange,$properties);
            while($row = $result->fetch_assoc())
            {
              $html .=  '<tr> 
              <td>'.$row["MaPhieuNhap"].'</td>
              <td>'.$row["NgayNhap"].'</td>
              <td>'.$row["TongTien"].'</td>
              <td>'.$row["TenNhaCungCap"].'</td>
              <td>'.$row["TenNhanVien"].'</td>
              
              <td style="text-align: center;">';

              if($this->ChiTietQuyenModel->KiemTraHanhDong("Xem",$_SESSION['MaNhomQuyen'],$_SESSION['Nhập Hàng'])==1)
              {
                $html.= ' <a title = "chi tiết" class = "btn btn_fix" href="http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietPhieuNhapPage,'.$row["MaPhieuNhap"].'"><i class="bx bx-dots-horizontal-rounded" ></i></a> ';
              }
              $html.='
              </td>
            </tr>';
            }
            echo $html;
        }
   }
   public function NhapHang(){
    $arr=$_POST['arr'];
    $mapn=$_POST['mapn'];
    $ngaynhap=$_POST['ngaynhap'];
    $tongtien=$_POST['tongtien'];
    $ncc=$_POST['ncc'];
    $manv=$_POST['manv'];
    $donvinhap="del bt";
    
    //echo $mapn." ".$ngaynhap." ".$tongtien." ".$ncc." ".$manv;
    $this->PhieuNhapModel->InsertPN($mapn,$ngaynhap,$tongtien,$ncc,$manv);
    for($i=0;$i<count($arr);$i++){
      $this->ChiTietPhieuNhapModel->InsertCTPN($mapn,$arr[$i]['mactsp'],$donvinhap,$arr[$i]['sl'],$arr[$i]['gn'],$arr[$i]['tt']);
      $resultSP=$this->SanPhamModel->GetSP($arr[$i]['masp']);
      $slton=0;
      if($resultSP->num_rows >0){
        while($row = $resultSP->fetch_assoc()){
          $slton=$row['SoLuongTonSP']+$arr[$i]['sl'];
          $this->SanPhamModel->UpdateSP($arr[$i]['masp'],$slton);
          if($row['GiaNhap']!=$arr[$i]['gn'])
          { 
            $giasp=(float)$arr[$i]['gn']*2-((float)$arr[$i]['gn']*(float)$row['MucKhuyenMai'])/100;
            $this->SanPhamModel->UpdateGNSP($arr[$i]['masp'],$arr[$i]['gn'],$giasp);
          }
        }
      }
      $resultCTSP=$this->chitietspmodel->GettheoMactsp($arr[$i]['mactsp']);
      $sl=0;
      $slnhap=0;
      if($resultCTSP->num_rows >0){
        while($row = $resultCTSP->fetch_assoc()){
          $sl=$row['SoLuongTon']+$arr[$i]['sl'];
          $slnhap=$row['SoLuongNhap']+$arr[$i]['sl'];
          $this->chitietspmodel->UpdateCTSPtheoSLNHAPvaSLTON($arr[$i]['mactsp'],$sl,$slnhap);
        }
      }
      
    }
    
  }

}

?>