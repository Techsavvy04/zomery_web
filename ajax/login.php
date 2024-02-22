<?php
require_once("../models/user.php");
require_once('../conf/conn.php');
$UserModel= new User();
 $taikhoan =$_POST['taikhoan'] ;
    $matkhau = $_POST['matkhau'];   
    $UserModel -> taikhoan = $taikhoan;
    $UserModel -> matkhau = $matkhau;
$result=$UserModel -> login();
if (isset($_POST['dangnhap'])) {
   
    $verify_tick = '<img class="verify_tick" src="./static/img/verified.png">';
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (DetectSQLInjection($taikhoan) || DetectSQLInjection($matkhau)) {
        echo "def";
     die();
    }
    if (trim($taikhoan) == "") {
        echo "Tài khoản không được bỏ trống!";
        exit;
    } elseif (trim($matkhau) == "") {
        echo "Mật khẩu không được bỏ trống!";
        exit;
    } else {
        if ($result) {
            
            $_SESSION['taikhoan']=$result;
            $role=$result -> role;
            $banned=$result -> banned;
            if($banned == 1){
                echo "Tài khoản của bạn đã bị cấm";
                exit;
            }else{
                if($role=="admin"){
                    $_SESSION['admin']="admin";
                    echo "success";
                }else{
                    $_SESSION['member']="member";
                    echo "success";
                }
            }
        }else{
            echo "Tài khoản hoặc mật khẩu không đúng !";
            exit;
        }
        
   