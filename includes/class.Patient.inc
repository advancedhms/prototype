<?php
	class Patient extends User {
		protected $_patient_id;
		public $patient_name;
		public $patient_age;
		protected $_time_created;
		protected $_time_updated;
		protected $_time_logged_in;
		protected $_time_logged_out;
		protected $_password;

		const ERROR_NOT_FOUND = 1000;
		const ERROR_INCORRECT = 1001;


		function __construct($data = array()) {
			$this->_time_created = time();
			if(!is_array($data)) {
				trigger_error('unable to construct class with: '.get_class($data));
			}
			if(count($data) > 0) {
				foreach($data as $name => $value) {
					if(in_array($name,array(
						'patient_id',
						'password',
						'time_created',
						'time_updated',
						'time_logged_in',
						'time_logged_out',
					))) {
						$name = '_'.$name;
					}
					$this->$name = $value;
				}
			}
		}
		/**
		*magic set method
		*takes a property value and sets the value
		**/
		function __set($name, $value) {
			if($name == 'patient_id') {
				$this->$name = $value;
				return;
			}
			trigger_error('Unable to access property via __set:'.$name);
				return NULL;
		}

		/**
		*magic get method
		*returns property
		**/
		function __get($name) {
			$property = '_'.$name;
			if(property_exists($this, $property)) {
				return $property;

				trigger_error('Unable to access property via __get:'.$name);
				return NULL;
		}

	}
		/**
		* Magic toSring
		* returns a display of patient data
		**/

		function __toString() {
			return $this->display();
		}

		/**
		*Display method
		*returns a concatenated string containing properties
		**/

		function display() {
			$output = '';
			$output .= 'Patient ID = ';
			$output .= $this->_patient_id;

			$output .= '</br>';
			$output .= 'Name = ';
			$output .= $this->patient_name;

			$output .= '</br>';
			$output .= 'Age = ';
			$output .= $this->patient_age;
			return $output;
		}

		 public static function login($patient_id,$password) {
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$sql = 'SELECT * from patient where patient_id = "'.$patient_id.'" ';
			$result = $mysqli->query($sql);

			if($result->num_rows == 0) {
				throw new ExceptionPatient('User does not exist', Patient::ERROR_NOT_FOUND);
			}
			else {
				if($row = $result->fetch_assoc()) {
					{
						if($password == $row['password']) {
							/*$sql1 = 'UPDATE patient_info SET time_logged_in = "'.(int) time().'"';
							$result1 = $mysqli->query($sql1);
							if($row1 = $result1->fetch_assoc()){
							*/
							return self::getInstance($row);
							}
						}
					}

				}
			}

			public static ValidateID($patient_id) {
				$db = Database::getInstance();
				$mysqli = $db->getConnection();
				$sql = 'SELECT * from patient where patientID = "'.$patient_id.'" ';
				$result = $mysqli->query($sql);

				if($result->num_rows == 0) {
					throw new ExceptionPatient('User does not exist', Patient::ERROR_NOT_FOUND);
					return FALSE;
				}
				return TRUE;
			}



		 public static function getInstance($data = array()) {
			return new Patient($data);
		}

	}
?>
