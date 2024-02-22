

<?php
session_start();
if(isset($_SESSION['admin'])){
    echo "admin";
    exit;
}elseif ($_SESSION['member']) {
		header("Location:./home.php");
} else{
    header("Location:./login.php");
}





