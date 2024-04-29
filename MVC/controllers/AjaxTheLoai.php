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
               <td>".$row['MaTheLoai']."</td>
               <td>".$row['MaChungLoai']."</td>
               <td>".$row['TenTheLoai']."</td>
               <td>
     
               <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
               <label class='switch'>  
               <input onchange='DoiTrangThaiTheLoai(this)' id='".$row['MaTheLoai']."' type='checkbox' value='1'";
                 if ($row["TrangThai"] == 1) {
                   $html .= "checked = 'checked'";
 
                 }
                 $html .=">
                 <span class='slider round'></span>
              </label>
               </td>
               <td>
               <!-- link  để chuyển sang trang nhóm quyền -->
                 <a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaTheLoaiPage,".$row['MaTheLoai']."'><i class='bx bxs-edit'></i></a>
               </td>
             </tr> ";
               
             }
 
             echo $html;
         }
         
    }
}
?>