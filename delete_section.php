<?php
 include 'dbconnection.php';

    $id=$_GET['sectionid'];
    $sql="delete from section where section_id=$id;";
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/SMS/manage_section.php");
    }else{

        echo"object is not deleted";    }

?>