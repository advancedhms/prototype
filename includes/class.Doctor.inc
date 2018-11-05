<?php

class Doctor{
    protected $_doctor_id;
    protected $_hospital_id;

    function __construct($data = array())
    {
        if(!is_array($data)) {
            trigger_error('Cannot create class with any information apart from arrays');
        }
        if(count($data) > 0) {
            foreach($data as $name => $value) {
                if(in_array($data, array(
                    'doctor_id',
                    'hospital_id',
                ))) {
                    $name = '_'.$name;
                }
                $this->$name = $value;
            }
        }
    }

    

}

 ?>
