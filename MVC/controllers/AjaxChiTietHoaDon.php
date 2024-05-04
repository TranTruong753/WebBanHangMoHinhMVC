
<?php
class AjaxChiTietHoaDon extends controller{
    public $ChiTietHoaDonModel;
    public $HoaDonModel;
    public function __construct(){
       $this->ChiTietHoaDonModel= $this->model("ChiTietHoaDonModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->HoaDonModel->updateTrangThai($ma,$trangThai);
    }


    public function getDanhSach()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
         $mahd=$_POST['mahd'];
 
         $html="";
         
        
         if($this->ChiTietHoaDonModel->getDanhSach($key,$pageIndex,$numberItem,$mahd)->num_rows >0)
         {
             $result=$this->ChiTietHoaDonModel->getDanhSach($key,$pageIndex,$numberItem,$mahd);
             while($row = $result->fetch_assoc())
             {
               $html .=  ' 
               <td>'.$row["MaChiTietSanPham"].'</td>
               <td>'.$row["TenSanPham"].'</td>
               <td>'.$row["SoLuong"].'</td>
               <td>'.$row["ThanhTien"].'</td>
               <td>
                    <button  class = "btn btn_delete" onclick="DeleteCTSP(this)" id="'.$row["MaChiTietSanPham"].'"><i class="bx bx-x"></i></button>  
                    <a class = "btn btn_fix" href="http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaChiTietSanPhamPage,'.$row["MaChiTietSanPham"].'"><i class="bx bxs-edit"></i></a>
                                               
               </td>
               
             </tr>';
               
             }
 
             echo $html;
         }
         
    }
}
?>
