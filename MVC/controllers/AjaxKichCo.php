<?php
class AjaxKichCo extends controller{
    public $KichCoModel;
    private $ChiTietQuyenModel;
    public function __construct(){
       $this->KichCoModel= $this->model("KichCoModel");
       $this->ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->KichCoModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertKC(){
        $tenkc=$_POST["tenkc"];
        if($this->KichCoModel->InsertKC($tenkc)){
            echo "true";
        }
        else echo "false";
    }

    public function UpdateKC(){
        $makc=$_POST["makc"];
        $tenkc=$_POST["tenkc"];
        if($this->KichCoModel->UpdateKC($makc,$tenkc)){
            echo "true";
        }
        else echo "false";       
    }

    // public function DeleteCL(){
    //     $macl=$_POST["macl"];
    //     $this->ChatLieuModel->DeleteCL($macl);
    // }

public function getDanhSachKC()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->KichCoModel->getDanhSachKC($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->KichCoModel->getDanhSachKC($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " <tr>
               <td>".$row['MaKichCo']."</td>
               <td>".$row['TenKichCo']."</td>
               <td>
                <label class='switch'>
                <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                  <input onchange='DoiTrangThaiKichCo(this)' id='".$row['MaKichCo']."' type='checkbox' value='1'";
                  if ($row["TrangThai"] == 1) {
                    $html .= "checked = 'checked'";
  
                  }
                  $html .=">
                  <span class='slider round'></span>
                </label>   
               </td>
               <td>
               <!-- link  để chuyển sang trang nhóm quyền -->";
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION['MaNhomQuyen'],$_SESSION['Kích Cỡ'])==1)
               {
                $html.= "<a class ='btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaKichCoPage,".$row['MaKichCo']."'><i class='bx bxs-edit'></i></a>";
               }
                 
                 
                $html.="
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>