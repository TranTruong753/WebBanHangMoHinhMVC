
<?php
class AjaxChiTietHoaDon extends controller{
    public $ChiTietHoaDonModel;
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
               <th style="text-align: center;" scope="row">'.$row["MaChiTietSanPham"].'</th>
               <td style="text-align: center;">'.$row["TenSanPham"].'</td>
               <td style="text-align: center;">'.$row["SoLuong"].'</td>
               <td style="text-align: center;">'.$row["ThanhTien"].'</td>
               <td style="text-align: center;"><pre><a href="http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaChiTietSanPhamPage,'.$row["MaChiTietSanPham"].'">Sửa</a>|
                <button  onclick="DeleteCTSP(this)" id="'.$row["MaChiTietSanPham"].'">Xóa</button> | 
               <br> </pre></td>
               
             </tr>';
               
             }
 
             echo $html;
         }
         
    }
}
?>
