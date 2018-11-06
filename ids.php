<?php
        /*$key=$_GET['key'];
        $array = array();
        $patients = new Patient;
        $patient_ids = $patients->getPatients($key); 

        while($patient_ids) {
            $array[] = $patient_ids['patient_id'];
        }
        echo json_encode($array);

        
    if(isset($_POST["query"]))  {
        $patients = new Patient;
        $patient_ids = $patients->getPatients($_POST["query"]);
        $output = '';
        $output = '<ul class="list-unstyled">';  
        if(mysqli_num_rows($patient_ids) > 0)  
        {  
            while($patient_ids)  
            {  
                $output .= '<li>'.$patient_ids['patient_id'].'</li>';  
            }  
        }  
        else  
        {  
            $output .= '<li>Patient Not Found</li>';  
        }  
        $output .= '</ul>';  
        echo $output;  
    }  */

    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","hms");
    $query=mysqli_query($con, "select * from patient where patient_id LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['patient_id'];
    }


    echo json_encode($array);
    mysqli_close($con);

?>