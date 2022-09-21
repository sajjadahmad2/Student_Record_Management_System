<?php
 include 'dbconnection.php';

    $id=$_GET['courseid'];
    $sql="delete from course where course_id=$id;";
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/SMS/manage_course.php");
    }else{

        echo"object is not deleted";    }

?>