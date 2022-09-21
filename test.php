
<?php
include "dbconnection.php";
$sql="select st.student_id,st.fname,st.lname,st.gender,c.cname,sb.subname,r.marks from result r  
        left join student st on st.student_id=r.student_id 
        left join subject sb on r.subject_id=sb.subject_id
        left join course c on c.course_id=sb.course_id
        where st.student_id= 1
        group by c.cname,sb.subname";
        $result=mysqli_query($link,$sql);
                        
        while($row=mysqli_fetch_assoc($result)){
            echo var_dump($row);
            
        }
        $sql2="select c.cname,sum(totalmarks) as tmarks,sum(marks) as ototal from student s 
        right join course c on c.course_id=s.course_id
        right join result r on s.student_id=r.subject_id
        where s.student_id=1";
        $result2=mysqli_query($link,$sql2);
        while($row2=mysqli_fetch_assoc($result2)){
            echo var_dump($row2);
        }
?>