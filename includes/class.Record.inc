<?php
    class Record {
        protected $_recordID;
        protected $patientID;
        public $temp;
        public $bp;
        protected $_diagnosis;
        public $prescription;
        public $remarks;
        protected $_doctor_id;
        public $doctor_name;
        protected $_hospital_id;
        public $hospital_name;
        public $time_created;

        public function __construct($data = array()) 
        {
            if(!is_array($data)) {
                trigger_error('Unable to construct class with: '.$data);
            }
            $this->time_created = time();
            if(count($data) > 0) {
                foreach($data as $name => $value){      
                    if(in_array($data, array(       //Set protected property names to begin with a _ 
                        'recordID',
                        'diagnosis',
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
            if('recordID' == $name || 'patient_id' == $name) {
            $this->$name = $value;
            return;
            }
           trigger_error('Unable to access property via __set: '.$name);
        }

        public static function getRecords($patientID){
            $db = Database::getInstance();
            $mysqli = $db->getConnection();
            $sql = "SELECT * FROM record WHERE patient_id = '$patientID'";
            $result = $mysqli->query($sql);

            if($row = $result->fetch_array()) {
                return $row;
            }
            trigger_error('Unable to fetch medical records');
        }

    }

?>