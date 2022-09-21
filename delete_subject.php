<?php
 include 'dbconnection.php';

    $id=$_GET['subjectid'];
    $sql="delete from subject where subject_id=$id;";
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/SMS/manage_subject.php");
    }else{

        echo"object is not deleted";    }

?>