<div id="account" class="header__account" ><a href="./login.php" style="text-decoration: none">
            <button  id="btLogin" class="header__account-btn primary-btn" style="display: <?php echo $type;?>"> Đăng nhập</button></a>
            <a href="./login.php" style="text-decoration: none">
            <button id ="btSignup" class="header__account-btn secondary-btn" style="display: <?php echo $type;?>">Đăng ký</button></a>
            <div id="accountForm" class="header__account-user" style="display: <?php echo $type2;?>">
                <a href="">
                    <img src="../assets/img/avatar.png" alt="" class="header__account-user-img">
                </a>
                <div class="header__account-user-menu">
                    <div class="account-user__info">
                        <a href="./setting.php">
                            <img src="../assets/img/avatar.png" alt=""  width="30px" height="30px">
                            <div>
                                <span class="account-user__info-name"><?php echo $fullName; ?></span> <br>
                                <span class="account-user__info-sub">Thông tin cá nhân</span> 
                            </div>
                        </a>
                    </div>
                    <div class="account-user__option">
                        <a href="./tour-history.php" class="account-user__option-item">
                            <img src="../assets/img/history.png" alt="">
                            <span>Lịch sử đặt tour</span>
                        </a href="">
                        <a href="./setting.php" target="_blank"class="account-user__option-item">
                            <img src="../assets/img/setting.png" alt="">
                            <span>Cài đặt</span>
                        </a href="">
                        <a href="Logout.php" class="account-user__option-item">
                            <img src="../assets/img/logout.png" alt="">
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>