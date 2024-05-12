<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
     <!-- link icon -->
     <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    <!-- link boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- link bootstrap css-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <!-- link bootstrap js-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script> -->
    <!--ajax -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo Root ?>public/css/admin/reset.css">
    <!-- <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/grid.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/sidebar.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/table.css"> -->
    <link rel="stylesheet" href="<?php echo Root ?>public/css/admin/sidebarPRO.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/admin/styles.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/admin/responsiveAdmin.css">
     <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>Trang Quản trị</title>
</head>

<body>
    <header class="hidden-pc header__table">
        <label for="menu_admin" class="btn btn-menu" onclick="showMenu()">menu</label>
        <input type="checkbox" id="menu_admin" hidden checked>
        <!-- <button type="button" class=""></button> -->
    </header>
    <div class="main">
        <!-- <div class="header"></div> -->
        <div class="all showContainer">
            <div class="">
                <?php
                require_once "blocks/sidebarPRO.php";
                ?>
            </div>
            <label  for="menu_admin" onclick="showMenu()" class="menu-overlay hidden-pc"></label>
            <div class="content">
                <?php
                    // print_r($data["Data"]);
                    $this->view("manage/pages/" . $data['detail'], ["DanhSach" => $data["Data"]]);
                    ?>
                <!-- <div class="">
                    
                </div> -->
            </div>

        </div>

     
    </div>


</body>

    <script>
        
    function showMenu(){
    var menuCheckbox = document.getElementById('menu_admin');
    var menu_overlay = document.querySelector('.menu-overlay');
    var sidebar = document.getElementById('sidebar');
    // Kiểm tra trạng thái của checkbox
        if (menuCheckbox.checked) {
            // Nếu checkbox được chọn, hiển thị menu và sidebar
        
            sidebar.style.transform = "translateX(0)";
            menu_overlay.style.opacity = "1";
            menu_overlay.style.visibility = "visible" ;
        } else {
            // Nếu checkbox không được chọn, ẩn menu và sidebar
            sidebar.style.transform = "translateX(-100%)";
            menu_overlay.style.opacity = "0";
            menu_overlay.style.visibility = "hidden" ;
        }
    }

    function closeMenu(){

    }

var isMenuOpen = false; // Biến để theo dõi trạng thái của menu

    function toggleMenu() {
        var sidebar = document.getElementById('sidebar');
        var menu_overlay = document.querySelector('.menu-overlay');
        
        // Kiểm tra trạng thái của menu và thay đổi nó
        if (!isMenuOpen) {
            sidebar.style.transform = "translateX(0)"; // Hiển thị menu
            menu_overlay.style.opacity = "1";
            menu_overlay.style.visibility = "visible" ;
        } else {
            sidebar.style.transform = "translateX(-100%)"; // Ẩn menu
            menu_overlay.style.opacity = "0";
            menu_overlay.style.visibility = "hidden" ;
        }
        
        isMenuOpen = !isMenuOpen; // Đảo ngược trạng thái của menu
    }
    </script>

        <script src="http://localhost/WebBanHangMoHinhMVC/public/script/admin/PhanTrang.js"></script>
        <script src="<?php echo Root . "public/script/admin/main.js" ?>"></script>
        <script src="<?php echo Root ."public/script/admin/sidebarPRO.js" ?>"></script>
  

</html>