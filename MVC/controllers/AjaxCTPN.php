<?php

class AjaxCTPN extends controller {

    private $SanPhamModel;
    private $chitietspmodel;
    private $PhieuNhapModel;
    public function __construct() {
       $this->SanPhamModel = $this->model("SanPhamModel");
       $this->chitietspmodel = $this->model("chitietspmodel");
       $this->PhieuNhapModel = $this->model("PhieuNhapModel");

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

}

?>