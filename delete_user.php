<?php
 include 'dbconnection.php';
    session_start();
    if(isset($_SESSION['username'])){
        $uid=$_SESSION['userid'];
    }
    if($uid == 2){
    $id=$_GET['userid'];
    $sql="delete from user where user_id=$id;";
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/SMS/manage_user.php");
    }else{

        echo"object is not deleted";    }
    }else{

        echo "Sorry You are not the Super Admin User";
    }

?>