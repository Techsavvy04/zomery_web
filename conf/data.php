<?php
require_once("../models/setting.php");
$SettingModel=new setting(); 
if($SettingModel -> GetSetting()){
    $result -> $SettingModel -> GetSetting();
} else {
    echo "Không thẻ lấy dữ liệu từ bảng cài đặt";
}
?>