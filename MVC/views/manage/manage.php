<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <!-- link boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- link bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- link bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!--ajax -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/grid.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/sidebar.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/table.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/manage/style.css">


    <title>Trang Quản trị</title>
</head>

<body>
    <div>
        <div class="header">
            <h1>header</h1>
        </div>
        <div class="grid">
            <div class="row">
                <div class="sidebar col l-3">
                    <?php
                    require_once "blocks/sidebar.php";
                    ?>
                </div>
                <div class="container col l-9">
                    <?php
                    $this->view("manage/pages/" . $data['page'], ["DanhSach" => $data["Data"]]);
                    ?>
                </div>
            </div>

        </div>

        <script src="<?php echo Root . "public/script/manage/main.js" ?>"></script>
    </div>


</body>

</html>