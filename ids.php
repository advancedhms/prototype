<?php
    if(isset($_POST["query"]))  {
        $patients = new Patient;
        $patient_ids = $patients->getPatients();
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
    }  

?>