<?php
class AjaxTheLoai extends controller{
    public $TheLoaiModel;
    public function __construct(){
       $this->TheLoaiModel= $this->model("TheLoaiModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->TheLoaiModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertTL(){
        $macl=$_POST["macl"];
        $tentl=$_POST["tentl"];
        if($this->TheLoaiModel->InsertTL($macl,$tentl)){
            echo "true";
        }
        else echo "false";
    }

    public function UpdateTL(){
        $matl=$_POST["matl"];
        $macl=$_POST["macl"];
        $tentl=$_POST["tentl"];
        if($this->TheLoaiModel->UpdateTL($matl,$macl,$tentl)){
            echo "true";
        }
        else echo "false";   
    }

    public function getDanhSachTL()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->TheLoaiModel->getDanhSachTL($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->TheLoaiModel->getDanhSachTL($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " <tr>
               <th style='text-align: center;' scope='row'>".$row['MaTheLoai']."</th>
               <td style='text-align: center;'>".$row['MaChungLoai']."</td>
               <td style='text-align: center;'>".$row['TenTheLoai']."</td>
               <td style='text-align: center;'>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                 <input onchange='DoiTrangThaiTheLoai(this)' id='".$row['MaTheLoai']."' type='checkbox' value='1'";
                 if ($row["TrangThai"] == 1) {
                   $html .= "checked = 'checked'";
 
                 }
                 $html .="
                 
               </td>
               <td style='text-align: center;'>
               <!-- link  để chuyển sang trang nhóm quyền -->
                 <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaTheLoaiPage,".$row['MaTheLoai']."'>Sửa</a></pre>
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>