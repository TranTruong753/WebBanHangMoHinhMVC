
<?php
class AjaxNhaCungCap extends controller{
    public $NhaCungCapModel;
    public function __construct(){
       $this->NhaCungCapModel= $this->model("NhaCungCapModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->NhaCungCapModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertNCC(){
        $tenncc=$_POST["tenncc"];
        $sdt=$_POST["sdt"];
        $dc=$_POST["dc"];
        if($this->NhaCungCapModel->InsertNCC($tenncc,$sdt,$dc)){
            echo "true";
        }
        else echo "false";
    }

    public function UpdateNCC(){
        $mancc=$_POST["mancc"];
        $tenncc=$_POST["tenncc"];
        $sdt=$_POST["sdt"];
        $dc=$_POST["dc"];
        if($this->NhaCungCapModel->UpdateNCC($mancc,$tenncc,$sdt,$dc)){
            echo "true";
        }
        else echo "false";   
    }

    public function getDanhSachNCC()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->NhaCungCapModel->getDanhSachNCC($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->NhaCungCapModel->getDanhSachNCC($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " <tr>
               <th style='text-align: center;' scope='row'>".$row['MaNhaCungCap']."</th>
               <td style='text-align: center;'>".$row['TenNhaCungCap']."</td>
               <td style='text-align: center;'>".$row['SoDienThoai']."</td>
               <td style='text-align: center;'>".$row['DiaChi']."</td>
               <td style='text-align: center;'>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                 <input onchange='DoiTrangThaiNhaCungCap(this)' id='".$row['MaNhaCungCap']."' type='checkbox' value='1'";
                 if ($row["TrangThai"] == 1) {
                   $html .= "checked = 'checked'";
 
                 }
                 $html .="
                 
               </td>
               <td style='text-align: center;'>
               <!-- link  để chuyển sang trang nhóm quyền -->
                 <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhaCungCapPage,".$row['MaNhaCungCap']."'>Sửa</a></pre>
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>
