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


    function __get($name)
    {
        $protected_property_name = '_'.$name;
        if(property_exists($this, $protected_property_name)) {
            return $this->$protected_property_name;
        }

        trigger_error('Cannot access property via __get: '.$name);
        return NULL;
    }


    function __set($name, $value) {
        if('doctor_id' == $name) {
        $this->$name = $value;
        return;
        }
       trigger_error('Unable to access property via __set: '.$name);
    }

    function ValidateID ($id = '') {
        if($id = ''){
            $id = $this->doctor_id;
        }
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = "SELECT * FROM doctor WHERE doctor_id = '$id'";
        $result = $mysqli->query($sql);
        if($row = $result->fetch_assoc()) {
            return true;
        }
        trigger_error('Unable to locate user with id: '.$id);
        return false;
    }

}

 ?>
