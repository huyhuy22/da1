<?php session_start();
ob_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include './model/danhmuc.php';
include './model/taikhoan.php';
include './user/header.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'card':
            include './user/card.php';
            break;
        case 'seach':
            if (isset($_POST['timkiem'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET["iddm"])) {
                $iddm = $_GET["iddm"];
                $nameiddm = $_GET["name"];
            } else {

                $iddm = 0;
            }
            $seach = seachsp($iddm, $kyw);
            include './user/sanphamseach.php';
            break;
        case 'dangnhap':
            if (isset($_POST['submit'])) {
                $user =  $_POST['user'];
                $pass = $_POST['password'];
                $check = check_login($user, $pass);
                if (is_array($check)) {
                    var_dump($check);
                    $_SESSION['user'] = $check;
                    header('location:index.php');
                } else {
                    $thongbao = "<span style='color:red;'
                    > tài khoản hoặc mật khẩu sai</span>";
                }
            }
            include './user/dangnhap.php';
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');


            break;
        case 'dangki':
            if (isset($_POST['dangki']) && ($_POST['dangki'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['password'];
                $sdt = $_POST['sdt'];
                // checkvalidate
                $errors = [];
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $user = trim($_POST["user"]);
                    $pass = trim($_POST["password"]);
                    $email = trim($_POST["email"]);
                    $sdt = trim($_POST["sdt"]);
                    if (empty($user)) {
                        $errors[] = "Tên người dùng không được để trống.";
                    } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $user)) {
                        $errors[] = "Tên người dùng chỉ được chứa chữ cái và số.";
                    }
                
                    if (empty($pass)) {
                        $errors[] = "Password không được để trống.";
                    } elseif (strlen($pass) < 6) {
                        $errors[] = "Password phải có ít nhất 6 ký tự.";
                    }
                
                    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Email không hợp lệ.";
                    }
                
                    if (empty($sdt) || !preg_match("/^[0-9]{10}$/", $sdt)) {
                        $errors[] = "Số điện thoại không hợp lệ.";
                    }
                
                    $existingUsernames = ['existingUser1', 'existingUser2', 'existingUser3'];
                
                    if (in_array($user, $existingUsernames)) {
                        $errors[] = "Tên người dùng đã tồn tại. Chọn tên khác.";
                    }
        
                    if (empty($errors)) {
                        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                        $thongbao = "Đăng kí thành công!";
                        sigin($user,$email,$pass,$sdt);
                    }
                }
                else{
                sigin($user,$email,$pass,$sdt);
                }
             
            }
            include './user/dangki.php';
            break;
        case 'dangnhap':

        case 'sanphamct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spct = sanphamct($id);
            }
            include('./user/sanphamct.php');
            break;
        default:
            include './user/home.php';
    }
} else {
    include './user/home.php';
}

include './user/footer.php';

ob_end_flush();
