<?php

class AjaxCTPN extends controller {

      private $SanPhamModel;
      private $chitietspmodel;
      private $PhieuNhapModel;
      private $ChiTietPhieuNhapModel;
      public function __construct() {
         $this->SanPhamModel = $this->model("SanPhamModel");
         $this->chitietspmodel = $this->model("chitietspmodel");
         $this->PhieuNhapModel = $this->model("PhieuNhapModel");
         $this->ChiTietPhieuNhapModel=$this->model("ChiTietPhieuNhapModel");

   }
    
    public function getDanhSach()
   {  $tongtien=0;
      $html="";
      if(isset($_POST['arr']))  {
      $arr=$_POST['arr'];
      
    // print_r($arr);
    //echo $arr[0]['mactsp'];
         
        for($i=0;$i<count($arr);$i++){
         $html .=  '<tr> 
                <th style="text-align: center;" scope="row">'.$arr[$i]['mactsp'].'</th>
                <td style="text-align: center;">'.$arr[$i]['masp'].'</td>
                <td style="text-align: center;">'.$arr[$i]['sl'].'</td>
                <td style="text-align: center;">'.$arr[$i]['gn'].'</td>
                <td style="text-align: center;">'.$arr[$i]['tt'].'</td>
                <td style="text-align: center;"><pre><button  onclick="XoaCTPN(this)" id="'.$arr[$i]['mactsp'].'">Xóa</button> </pre></td>
               </tr>';
               $tongtien=$tongtien+$arr[$i]['tt'];
        }
  }
   $data=json_encode(["html"=>$html,"tongtien"=>$tongtien]);
   echo $data;
}

    
   public function HienDanhSach(){  
      $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        $mapn=$_POST['mapn'];

        $html="";
        
       
        if($this->ChiTietPhieuNhapModel->getDanhSach($key,$pageIndex,$numberItem,$mapn)->num_rows >0)
        {
            $result=$this->ChiTietPhieuNhapModel->getDanhSach($key,$pageIndex,$numberItem,$mapn);
            while($row = $result->fetch_assoc())
            {
              $html .=  '<tr> 
              
              <th style="text-align: center;" scope="row">'.$row["MaChiTietSanPham"].'</th>
              <td style="text-align: center;">'.$row["TenSanPham"].'</td>
              <td style="text-align: center;">'.$row["SoLuong"].'</td>
              <td style="text-align: center;">'.$row["TienNhap"].'</td>
              <td style="text-align: center;">'.$row["ThanhTien"].'</td>
              
              
            </tr>';
              
            }

            echo $html;
        }

   }

}

?>