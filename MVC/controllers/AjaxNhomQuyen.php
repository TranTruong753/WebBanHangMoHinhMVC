<?php

// http://localhost/live/Home/Show/1/2

class AjaxNhomQuyen extends controller
{

    // Must have SayHi()
    private $NhomQuyenModel;
    private $ChiTietQuyenModel;
    function __construct()
    {
        $this->NhomQuyenModel = $this->model('NhomQuyenModel');
        $this->ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
      }

    public function DoiTrangThai()
    {
        $ma = $_POST['ma'];
        $trangThai = $_POST['trangThai'];
        $this->NhomQuyenModel->updateTrangThai($ma,$trangThai);
    }

   public function ThemDuLieunhomQuyen()
   {
    $TenNhomQuyen = $_POST['TenNhomQuyen'];
    if( $this->NhomQuyenModel->insert($TenNhomQuyen)==1) return 1;
    else return 0;
   }


   public function SuaDuLieuNhomQuyen()
   {
    $MaNhomQuyen = $_POST['MaNhomQuyen'];
    $TenNhomQuyen = $_POST['TenNhomQuyen'];
    if( $this->NhomQuyenModel->update($TenNhomQuyen,$MaNhomQuyen)==1) echo 'true';
    else echo 'false';
   }
   public function TimKiemQuaTen()
   {
    $TenNhomQuyen = $_POST['TenNhomQuyen'];
    if( $this->NhomQuyenModel->TimKiemQuaTen($TenNhomQuyen)==1) echo 'true';
    else echo 'false';
   }

   public function XoaDuLieuNhomQuyen()
   {
    $ma = $_POST["ma"];
    $checkChuaSuDung  = true ;
    if($this->NhomQuyenModel->KiemTraChiTietQuyenSuDung($ma) == 1) $checkChuaSuDung = false;
    if($this->NhomQuyenModel->KiemTraTaiKhoanSuDung($ma) == 1 ) $checkChuaSuDung=false;
    if($checkChuaSuDung == true)
    {
      if($this->NhomQuyenModel->delete($ma)==1) echo 'Xóa Nhóm Quyền Thành Công!';
      else echo 'Xóa Nhóm Quyền Thất Bại!';
    }
      else echo "Nhóm Quyền Đã Được Sử Dụng";
   }
   public function getDanhSach()
   {
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];

        $html="";
       
        if($this->NhomQuyenModel->getDanhSach($key,$pageIndex,$numberItem)->num_rows >0)
        {
            $result = $this->NhomQuyenModel->getDanhSach($key,$pageIndex,$numberItem);
            while($row = $result->fetch_assoc())
            {
              $html .=  " <tr>
              <td>".$row['MaNhomQuyen']."</td>
              <td>".$row['TenNhomQuyen']."</td>
              <td>
              <label class='switch'>
              <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                <input onchange='DoiTrangThaiNhomQuyen(this)' id='".$row['MaNhomQuyen']."' type='checkbox' value='1'";
                if ($row["TrangThai"] == 1) {
                  $html .= "checked = 'checked'";

                }
                $html .=">
                <span class='slider round'></span>
              </label>  
                
              </td>
              <td style='text-align: center;'>
              <!-- link  để chuyển sang trang nhóm quyền -->";

              if($this->ChiTietQuyenModel->KiemTraHanhDong("Xóa",$_SESSION["MaNhomQuyen"],$_SESSION["Nhóm Quyền"])==1)
              {
                $html.= "<a class = 'btn btn_delete' href='#' onclick='btnXoa(this)' id='".  $row["MaNhomQuyen"] ."'><i class='bx bx-x'></i></a>";
              }
              if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION["MaNhomQuyen"],$_SESSION["Nhóm Quyền"])==1)
              {
                $html.= "<a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhomQuyenPage,".$row['MaNhomQuyen']."'><i class='bx bxs-edit'></i></a>   ";
              }
                  
                
                    $html.="         
              </td>
            </tr> ";
              
            }
            echo $html;
        }
        
   }    
}
