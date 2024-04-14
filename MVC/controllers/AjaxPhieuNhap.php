<?php

class AjaxPhieuNhap extends controller {

    private $SanPhamModel;
    private $chitietspmodel;
    private $PhieuNhapModel;
    private $ChiTietPhieuNhapModel;
    public function __construct() {
       $this->SanPhamModel = $this->model("SanPhamModel");
       $this->chitietspmodel = $this->model("chitietspmodel");
       $this->PhieuNhapModel = $this->model("PhieuNhapModel");
       $this->ChiTietPhieuNhapModel = $this->model("ChiTietPhieuNhapModel");

    }
    
    public function getDanhSach()
   {
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];

        $html="";
        if($this->PhieuNhapModel->getDanhSach($key,$pageIndex,$numberItem)->num_rows >0)
        {
            $result=$this->PhieuNhapModel->getDanhSach($key,$pageIndex,$numberItem);
            while($row = $result->fetch_assoc())
            {
              $html .=  '<tr> 
              <th style="text-align: center;" scope="row">'.$row["MaPhieuNhap"].'</th>
              <td style="text-align: center;">'.$row["NgayNhap"].'</td>
              <td style="text-align: center;">'.$row["TongTien"].'</td>
              <td style="text-align: center;">'.$row["TenNhaCungCap"].'</td>
              <td style="text-align: center;">'.$row["TenNhanVien"].'</td>
              
              <td style="text-align: center;"><pre> 
              <br> <a href="http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietPhieuNhapPage,'.$row["MaPhieuNhap"].'">Chi Tiết</a> </pre></td>
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
    
    echo $mapn." ".$ngaynhap." ".$tongtien." ".$ncc." ".$manv;
    $this->PhieuNhapModel->InsertPN($mapn,$ngaynhap,$tongtien,$ncc,$manv);
    for($i=0;$i<count($arr);$i++){
      $this->ChiTietPhieuNhapModel->InsertCTPN($mapn,$arr[$i]['mactsp'],$donvinhap,$arr[$i]['sl'],$arr[$i]['gn'],$arr[$i]['tt']);
      $resultSP=$this->SanPhamModel->GetSP($arr[$i]['masp']);
      $slton=0;
      if($resultSP->num_rows >0){
        while($row = $resultSP->fetch_assoc()){
          $slton=$row['SoLuongTonSP']+$arr[$i]['sl'];
          $this->SanPhamModel->UpdateSP($arr[$i]['masp'],$slton);
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