<main class="catalog  mb ">

    <div class="boxleft">
        <div class="mb">
            <div class="box_title">ĐĂNG KÍ THÀNH VIÊN</div>
            <div class="box_content form_account">
                <form action="index.php?act=dangky" method="post" >
                        Email
                        <input type="email" name="email">
                        Tên Đăng Nhập
                        <input type="text" name="user">
                        Mật Khẩu
                        <input type="password" name="pass">
                        <input type="submit" value="Đăng ký" name="dangky">
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