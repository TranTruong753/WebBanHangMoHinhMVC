<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $theloai=$data["DanhSach"]["TL"];
    $chungloai=$data["DanhSach"]["CL"];
       
?>
<h1 class = 'styleText-02' >Sửa Thể Loại</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/TheLoaiPage"> Quay về Trang Thể Loại></a>


<form id="submit_form" method="post" action="" class="form_add">
<?php
    if ($theloai->num_rows > 0) {
        while ($row = $theloai->fetch_assoc()) {
            echo '
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="matheloai">Mã thể loại</label>
                <input class="input-add" type="text" id="matheloai" name="matheloai" value="'.$row['MaTheLoai'].'"  readonly>
           </div>

            <div class = "input-add_wrap">

                <label class="styleText-04 label-add" for="machungloai">Mã chủng loại</label>
                <div class = "custom-select select-add">
                    <select name="" id="machungloai"  class="">';
                    if ($chungloai->num_rows > 0) {
                        while ($rows = $chungloai->fetch_assoc()) {
                                echo '<option  value="'.$rows['MaChungLoai'].'" >'.$rows['TenChungLoai'].'</option>';
                        }
                    }
                    echo '
                    </select>
                </div>

            </div>

          <div class = "input-add_wrap">

                <label class="styleText-04 label-add" for="tentheloai">Tên thể loại</label>
                <input class="input-add" type="text" id="tentheloai" name="tentheloai" value="'.$row['TenTheLoai'].'" >

          </div>

            <div class = "input-add_wrap"> 
                <button class = "btn"  type = "button" onclick="UpdateTL()" value="update">Cập nhật</button>
            </div>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyTLJS.js"></script>