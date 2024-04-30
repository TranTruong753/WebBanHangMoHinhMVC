<?php

// http://localhost/live/Home/Show/1/2

class AjaxNhomQuyen extends controller
{

    // Must have SayHi()
    private $NhomQuyenModel;
    function __construct()
    {
        $this->NhomQuyenModel = $this->model('NhomQuyenModel');
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
              <th style='text-align: center;' scope='row'>".$row['MaNhomQuyen']."</th>
              <td style='text-align: center;'>".$row['TenNhomQuyen']."</td>
              <td style='text-align: center;'>
    
              <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                <input onchange='DoiTrangThaiNhomQuyen(this)' id='".$row['MaNhomQuyen']."' type='checkbox' value='1'";
                if ($row["TrangThai"] == 1) {
                  $html .= "checked = 'checked'";

                }
                $html .="
                
              </td>
              <td style='text-align: center;'>
              <!-- link  để chuyển sang trang nhóm quyền -->
                <pre><a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhomQuyenPage,".$row['MaNhomQuyen']."'>Sửa</a> | <a href='#' onclick='btnXoa(this)' id='".  $row["MaNhomQuyen"] ."'  >Xóa</a></pre>
              </td>
            </tr> ";
              
            }
            echo $html;
        }
        
   }    
}
