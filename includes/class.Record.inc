<?php
    class Record {
        protected $_recordID;
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
                    if(in_array($data, array(       //Set protected property names to begin with a _                        'recordID',
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
    }

?>