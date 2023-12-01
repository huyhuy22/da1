<main class="catalog  mb ">

    <div class="boxleft">
        <div class="mb">
            <div class="box_title">CẬP NHẬT TÀI KHOẢN</div>
            <div class="box_content form_account">
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
    
                    }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post" >
                        Email
                        <input type="email" name="email" value="<?=$email?>">
                        Tên Đăng Nhập
                        <input type="text" name="user" value="<?=$user?>">
                        Mật Khẩu
                        <input type="password" name="pass" value="<?=$pass?>">
                        ĐỊA CHỈ
                        <input type="text" name="address" value="<?=$address?>">
                        ĐIỆN THOẠI
                        <input type="text" name="tel" value="<?=$tel?>">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" value="Cập nhật" name="capnhat">
                        <input type="reset" value="Nhập lại" >
                </form>
                <h2 class = "thongbao">
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
               
                ?>
                 </h2>
            </div>
        </div>
    </div>

    <div class="boxright">

        <?php include "view/boxright.php";  ?>
    </div>

</main>