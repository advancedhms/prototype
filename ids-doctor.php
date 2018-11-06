<?php  
$key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","hms");
    $query=mysqli_query($con, "select * from doctor where doctor_id LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['doctor_id'];
    }


    echo json_encode($array);
    mysqli_close($con);

    ?>