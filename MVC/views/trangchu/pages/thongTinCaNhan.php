
    <?php 
         if(!isset($userName)){
            $userName = $_SESSION['Ten'];
         }

         if(!isset($email)) {
            $email = $_SESSION['email'];
         }

         if(isset($data['KH'])){
      
            if ($data['KH']->num_rows > 0) {
            
                while ($row = $data['KH']->fetch_assoc()) {
                 
                   
                    $userPhone = $row['SoDienThoai'];
                    $sex = $row['GioiTinh'];
                 
                }
            }
    
        }
                      
             
        
    ?>


    <header class="user__header ">
        <h2 class="client-title-01">Thông Tin Cá Nhân</h2>
    </header>
    <main >
        <form action="" method="POST" class="user__main" id="my_form">
            <div class="user-row">
                <div class="user-column">
                    <label for="userName" class="clinet-title-02">Nhập họ và tên</label>
                    <input type="text" name="userName" id="userName" 
                    <?php 
                        if(isset($userName)){
                            echo ' value="'.$userName.'" ';
                        }
                    ?>
                    class="user__input">
                    <div id="error-message-user"></div>
                </div>
            </div>
    
            <div class="user-row">
                <div class="user-column">
                    <label for="userPhone" class="clinet-title-02">Số điện thoại</label>
                    <input type="tel" name="userPhone" id="userPhone" 
                    <?php 
                        if(isset($userPhone)){
                            echo ' value="'.$userPhone.'" ';
                        }
                    ?>  
                    
                    class="user__input">
                    <div id="error-message-phone"></div>
                </div>
                <div class="user-column" class="clinet-title-02">
                    <label for="userEmail">Email</label>
                    <input type="email" name="userEmail" id="userEmail" 
                    <?php 
                        if(isset($email)){
                            echo ' value="'.$email.'" ';
                        }
                    ?>                 
                    class="user__input" readonly disabled >
                    <div id="error-email-user"></div>
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
                                    value="Nam"
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
                                    value="Nữ"
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
                                    value="Khác"
                                    hidden
                                    <?php 
                                        if($sex == "Khác") {
                                            ?> checked <?php
                                        }
                                    ?>
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
    
        </form>
        
            <button class="btn btn--primary btn-user" onclick="updateKh()" id="btn">Lưu chỉnh sửa</button>                       
            <!-- <a href="#!"class ="btn btn--primary btn-user" >Lưu chỉnh sửa</a>
        -->
    </main>
    
      

    <script src="<?php echo Root ?>public/script/TrangChu/QLThongTinKHJS.js"></script>
    <script src="<?php echo Root ?>public/script/TrangChu/batLoiSuaThongTinKH.js"></script>
