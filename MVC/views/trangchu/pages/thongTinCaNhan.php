<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thongTinCaNhan.css">
    <!-- <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thanhtoansanpham.css"> -->
</head>
<body>
   

    <header class="user__header ">
        <h2 class="client-title-01">Thông Tin Cá Nhân</h2>
    </header>
    <main class="user__main">
        <div class="user-row">
           <div class="user-column">
                <label for="userName" class="clinet-title-02">Nhập họ và tên</label>
                <input type="text" name="" id="userName" value="<?php echo $userName?>" class="user__input">
           </div>
        </div>

        <div class="user-row">
            <div class="user-column">
                <label for="userPhone" class="clinet-title-02">Số điện thoại</label>
                <input type="tel" name="" id="userPhone" value="<?php echo $userPhone?>" class="user__input">
            </div>
            <div class="user-column" class="clinet-title-02">
                <label for="userEmail">Email</label>
                <input type="email" name="" id="userEmail" value="<?php echo $email?>" class="user__input">
            </div>
            
        </div>

        <div class="user-row">
            <div class="user-column">
                <label for="">Giới tính</label>
                   <div class="user__radio-wrap">
                        <div class="radio-row">
                            <input
                                class="user__radio-input"
                                type="radio"
                                id="boy"
                                name="sex"
                                value="boy"
                                hidden
                                <?php 
                                    if($sex == "Nam") {
                                        ?> checked <?php
                                    }
                                ?>
                            />
                                <label class="user__radio-label" for="boy"
                                >
                                    <span class="user__radio-span"></span>
                                    Nam
                                </label
                            >
                        </div>
                        <div class="radio-row">
                            <input
                                class="user__radio-input"
                                type="radio"
                                id="girl"
                                name="sex"
                                value="girl"
                                hidden
                                <?php 
                                    if($sex == "Nữ") {
                                        ?> checked <?php
                                    }
                                ?>
                            />
                                <label class="user__radio-label" for="girl"
                                >
                                    <span class="user__radio-span"></span>
                                    Nữ
                                </label
                            >
                        </div>
                        <div class="radio-row">
                            <input
                                class="user__radio-input"
                                type="radio"
                                id="other"
                                name="sex"
                                value="other"
                                hidden
                            />
                                <label class="user__radio-label" for="other"
                                >
                                    <span class="user__radio-span"></span>
                                    Khác
                                </label
                            >
                        </div>
                   </div>
            </div>
            <!-- <div class="user-column">
                <label for="userDate">Ngày sinh</label>
                <input type="date" name="" id="userDate" value="2017-06-01" class="user__input">
            </div> -->
        </div>

       
            <a href="#!"class ="btn btn--primary btn-user" >Lưu chỉnh sửa</a>
     
    </main>
</body>
</html>