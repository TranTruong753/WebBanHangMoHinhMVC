<?php
class AjaxChiTietQuyen extends controller
{

    private $ChiTietQuyenModel;
    private $NhomQuyenModel;
    private $ChucNangModel;
    public function __construct()
    {
        $this->ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
        $this->NhomQuyenModel = $this->model("NhomQuyenModel");
        $this->ChucNangModel = $this->model("ChucNangModel");
    }

    public function CapNhatTrangThai()
    {
        $TrangThai = $_POST["TrangThai"];
        $MaNhomQuyen =  $_POST["MaNhomQuyen"];
        $MaChucNang =  $_POST["MaChucNang"];
        $HanhDong = $_POST["HanhDong"];
        if($TrangThai == 1)
        {
            if($this->ChiTietQuyenModel->KiemTraHanhDong($MaNhomQuyen,$MaChucNang,$HanhDong)==1){
                return 1;
            }else
            {
                 return $this->ChiTietQuyenModel->insert($MaNhomQuyen,$MaChucNang,$HanhDong);
            }
        }
        else if($TrangThai == 0)
        {
           return $this->ChiTietQuyenModel->XoaKhiCapNhatTrangThaiCheckBox($MaNhomQuyen,$MaChucNang,$HanhDong);
        }
        
    }

    public function ThemDuLieuChiTietQuyen()
    {
        $MaNhomQuyen =  $_POST["MaNhomQuyen"];
        $MaChucNang =  $_POST["MaChucNang"];
        $HanhDong = $_POST["HanhDong"];
        if ($this->ChiTietQuyenModel->KiemTraHanhDong($MaNhomQuyen, $MaChucNang, $HanhDong) == 1) {
            echo "";
        } else {
            if ($this->ChiTietQuyenModel->insert($MaNhomQuyen, $MaChucNang, $HanhDong) == 1) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    public function XoaDuLieuChiTietQuyen()
    {
        $MaNhomQuyen =  $_POST["MaNhomQuyen"];
        $MaChucNang =  $_POST["MaChucNang"];
        // print_r($_POST);
        if ($this->ChiTietQuyenModel->delete($MaNhomQuyen, $MaChucNang) == 1) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function getDanhSach()
    {
        $key = $_POST["key"];
        $index = $_POST["index"];
        $size = $_POST["size"];
        print_r($_POST);
        $html = "";
        $result = $this->ChiTietQuyenModel->getDanhSach($key, $index, $size);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $html .= " <tr> ";

                $html.=" <th><input type='checkbox' class='CheckBoxXoa' id='" . $row['MaNhomQuyen'] . "/" . $row['MaChucNang'] . "'></th>
                  <th style='text-align: center;' scope='row'> " . $this->NhomQuyenModel->getTenNhomQuyenTuMa($row['MaNhomQuyen']) . "</th>
                  <td style='text-align: center;'>" . $this->ChucNangModel->getTenChucNangTuMa($row['MaChucNang']) . "</td>
                  <td style='text-align: center;'><input class='CheckBoxHanhDongTrongTable' type='checkbox' id='" . $row['MaNhomQuyen'] . "/" . $row['MaChucNang'] . "/Xem' ";
                if ($this->ChiTietQuyenModel->KiemTraHanhDong($row['MaNhomQuyen'], $row['MaChucNang'], 'Xem')) $html .= "checked = 'checked'; >";
                   $html.="</td><td style='text-align: center;'><input class='CheckBoxHanhDongTrongTable' type='checkbox' id='" . $row['MaNhomQuyen'] . "/" . $row['MaChucNang'] . "/Thêm' ";
                if ($this->ChiTietQuyenModel->KiemTraHanhDong($row['MaNhomQuyen'], $row['MaChucNang'], 'Thêm')) $html .= " checked = 'checked' >";
                   $html.="</td><td style='text-align: center;'><input class='CheckBoxHanhDongTrongTable' type='checkbox' id='" . $row['MaNhomQuyen'] . "/" . $row['MaChucNang'] . "/Xóa' ";
                if ($this->ChiTietQuyenModel->KiemTraHanhDong($row['MaNhomQuyen'], $row['MaChucNang'], 'Xóa'))  $html .= " checked = 'checked'>"; 
                    $html.="</td><td style='text-align: center;'><input class='CheckBoxHanhDongTrongTable' type='checkbox' id='" . $row['MaNhomQuyen'] . "/" . $row['MaChucNang'] . "/Sửa' ";
                if ($this->ChiTietQuyenModel->KiemTraHanhDong($row['MaNhomQuyen'], $row['MaChucNang'], 'Sửa')) $html .= "checked = 'checked'>";
               $html.="</td></tr>";
            }
        }
        echo $html;
    }
}
