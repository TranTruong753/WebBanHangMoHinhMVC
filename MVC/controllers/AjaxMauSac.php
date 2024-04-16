<?php
class AjaxMauSac extends controller{
    public $MauSacModel;
    public function __construct(){
       $this->MauSacModel= $this->model("MauSacModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->MauSacModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertMS(){
        $tenms=$_POST["tenms"];
        if($this->MauSacModel->InsertMS($tenms)){
            echo "true";
        }
        else echo "false";
    }

    public function UpdateMS(){
        $mams=$_POST["mams"];
        $tenms=$_POST["tenms"];
        if($this->MauSacModel->UpdateMS($mams,$tenms)){
            echo "true";
        }
        else echo "false";       
    }

    public function getDanhSachMS()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->MauSacModel->getDanhSachMS($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->MauSacModel->getDanhSachMS($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " <tr>
               <th style='text-align: center;' scope='row'>".$row['MaMauSac']."</th>
               <td style='text-align: center;'>".$row['TenMauSac']."</td>
               <td style='text-align: center;'>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                 <input onchange='DoiTrangThaiMauSac(this)' id='".$row['MaMauSac']."' type='checkbox' value='1'";
                 if ($row["TrangThai"] == 1) {
                   $html .= "checked = 'checked'";
 
                 }
                 $html .="
                 
               </td>
               <td style='text-align: center;'>
               <!-- link  để chuyển sang trang nhóm quyền -->
                 <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaMauSacPage,".$row['MaMauSac']."'>Sửa</a></pre>
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>