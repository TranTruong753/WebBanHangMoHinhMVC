
<?php
class AjaxNhaCungCap extends controller{
    public $NhaCungCapModel;
    private $ChiTietQuyenModel;
    public function __construct(){
       $this->NhaCungCapModel= $this->model("NhaCungCapModel");
       $this->ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
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

    public function DeleteNCC(){
        $mancc=$_POST["mancc"];
        $this->NhaCungCapModel->DeleteNCC($mancc);
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
               <td>".$row['MaNhaCungCap']."</td>
               <td>".$row['TenNhaCungCap']."</td>
               <td>".$row['SoDienThoai']."</td>
               <td>".$row['DiaChi']."</td>
               <td>
                <label class='switch'>
                <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                  <input onchange='DoiTrangThaiNhaCungCap(this)' id='".$row['MaNhaCungCap']."' type='checkbox' value='1'";
                  if ($row["TrangThai"] == 1) {
                    $html .= "checked = 'checked'";
  
                  }
                  $html .=">
                  <span class='slider round'></span>
                </label>    
               </td>
               <td>
               <!-- link  để chuyển sang trang nhóm quyền -->
               <div class ='btn-wrap'>";
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Xóa",$_SESSION["MaNhomQuyen"],$_SESSION["Nhà Cung Cấp"])==1)
               {
                 $html.= "<a class ='btn btn_delete' href='#' onclick='btnXoa(this)' id='".$row["MaNhaCungCap"] ."'  ><i class='bx bx-x'></i></a>";
               }
               if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION['MaNhomQuyen'],$_SESSION['Nhà Cung Cấp'])==1)
               {
                $html.= "<a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhaCungCapPage,".$row['MaNhaCungCap']."'><i class='bx bxs-edit'></i></a>";
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
