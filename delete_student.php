<?php
 include 'dbconnection.php';

    $id=$_GET['studentid'];
    $sql="delete from student where student_id=$id;";
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/SMS/manage_student.php");
    }else{

        echo"object is not deleted";    }

?>