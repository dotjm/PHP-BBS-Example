<?php session_start();
include "../API/dbcon.php";

$userid=$_POST["userid"];
$passwd=$_POST["passwd"];
$passwd=hash('sha512',$passwd);

$query = "select * from members where userid='".$userid."' and passwd='".$passwd."'";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();

if($rs){
    $_SESSION['UID']= $rs->userid;
    $_SESSION['UNAME']= $rs->username;

    echo "<script>alert('어서오십시오.');location.href='../';</script>";
    exit;

}else{
    echo "<script>alert('아이디나 암호가 틀렸습니다. 다시한번 확인해주십시오.');history.back();</script>";
    exit;
}
?>