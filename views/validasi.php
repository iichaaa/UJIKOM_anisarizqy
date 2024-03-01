<?php 
error_reporting(E_ALL ^ E_NOTICE);  
include_once '../controllers/C_login.php';

if ($_SESSION["Role"] == "kasir") {
    echo "";
    // header("location:home_user.php");

} elseif ($_SESSION["Role"] == "admin") {
    echo "";
    // header("location:home.php");

} else {
	echo "<script type='text/javascript'> 
window.location.href='../index.php' 
</script> ";
}
?>