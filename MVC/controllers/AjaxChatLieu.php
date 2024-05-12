
<?php
class AjaxChatLieu extends controller{
    public $ChatLieuModel;
    private $ChiTietQuyenModel;
    public function __construct(){
       $this->ChatLieuModel= $this->model("ChatLieuModel");
       $this->ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->ChatLieuModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertCL(){
        $tencl=$_POST["tencl"];
        if($this->ChatLieuModel->InsertCL($tencl)){
            echo "true";
        }
        else echo "false";
    }

    public function UpdateCL(){
        $macl=$_POST["macl"];
        $tencl=$_POST["tencl"];
        if($this->ChatLieuModel->UpdateCL($macl,$tencl)){
            echo "true";
        }
        else echo "false";   
    }

    public function DeleteCL(){
        $macl=$_POST["macl"];
        if($this->ChatLieuModel->DeleteCL($macl)==1){
            $data=true;
          }else{
            $data=false;
          }
          echo $data;
    }
    public function getDanhSachCL()
    {
         $key = $_POST['key'];
         $pageIndex = $_POST['index'];
         $numberItem = $_POST['size'];
 
         $html="";
         
        
         if($this->ChatLieuModel->getDanhSachCL($key,$pageIndex,$numberItem)->num_rows >0)
         {
             $result=$this->ChatLieuModel->getDanhSachCL($key,$pageIndex,$numberItem);
             while($row = $result->fetch_assoc())
             {
               $html .=  " 
               <tr>
               <td>".$row['MaChatLieu']."</td>
               <td>".$row['TenChatLieu']."</td>
               <td>
                <label class='switch'>
                <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                  <input onchange='DoiTrangThaiChatLieu(this)' id='".$row['MaChatLieu']."' type='checkbox' value='1'";
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
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Xóa",$_SESSION["MaNhomQuyen"],$_SESSION["Chất Liệu"])==1)
               {
                 $html.= "<a class ='btn btn_delete' href='#' onclick='btnXoa(this)' id='".$row["MaChatLieu"] ."'  ><i class='bx bx-x'></i></a>";
               }
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION['MaNhomQuyen'],$_SESSION['Chất Liệu'])==1)
               {
                $html.= "<a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaChatLieuPage,".$row['MaChatLieu']."'><i class='bx bxs-edit'></i></a>";
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
