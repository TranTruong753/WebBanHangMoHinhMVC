<?php
class AjaxMauSac extends controller{
    public $MauSacModel;
    private $ChiTietQuyenModel;
    public function __construct(){
       $this->MauSacModel= $this->model("MauSacModel");
       $this->ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
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
    public function DeleteMS(){
      $mams=$_POST["mams"];
      if($this->MauSacModel->DeleteMS($mams)==1){
        $data=true;
      }else{
        $data=false;
      }
      echo $data;
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
               <td>".$row['MaMauSac']."</td>
               <td>".$row['TenMauSac']."</td>
               <td>
                <label class='switch'>
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                 <input onchange='DoiTrangThaiMauSac(this)' id='".$row['MaMauSac']."' type='checkbox' value='1'";
                 if ($row["TrangThai"] == 1) {
                   $html .= "checked = 'checked'";
 
                 }
                 $html .=">
                  <span class='slider round'></span>
                </label>  
               </td>
               <td style='text-align: center;'>
               <!-- link  để chuyển sang trang nhóm quyền -->
               <div class ='btn-wrap'>";
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Xóa",$_SESSION["MaNhomQuyen"],$_SESSION["Màu Sắc"])==1)
               {
                 $html.= "<a class ='btn btn_delete' href='#' onclick='btnXoa(this)' id='".$row["MaMauSac"] ."'  ><i class='bx bx-x'></i></a>";
               }
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION['MaNhomQuyen'],$_SESSION['Màu Sắc'])==1)
               {
                $html.= "<a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaMauSacPage,".$row['MaMauSac']."'><i class='bx bxs-edit'></i></a>";
               }
                 $html.="
                 </div>
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>