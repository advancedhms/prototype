<?php
/*require_once 'class.Database.inc';
include 'class.User.inc';
include 'class.Patient.inc';
*/
class Admin {
  protected $username;
  protected $name;
  protected $email;
  protected $hospitalid;
  protected $_db;
  protected $_time_created;
  public $error_msg = '';

  public function __construct($data = array()) {
    $this->_db = Database::getInstance();
    if(!is_array($data)) {
      trigger_error('unable to construct class with: '.get_class($data));
    }
    $this->_time_created = time();
    if(count($data) > 0) {
      foreach ($data as $name => $value) {
        $this->name = $value;
      }
    }
    if($this->checkUser($data['username'])) {
      $this->save();
    }
    
  }

  /**
  *magic set method
  *takes a property value and sets the value
  **/
  function __set($name, $value) {
    if($name == 'username') {
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

    if(property_exists($this, $name)) {
      return $property;

      trigger_error('Unable to access property via __get:'.$name);
      return NULL;
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
    $output .= 'Admin ID = ';
    $output .= $this->admin_id;

    $output .= '</br>';
    $output .= 'Name = ';
    $output .= $this->user_name;

    # remaining goes here
    return $output;
  }

  }

  public function register_Patient($patient_id, $password) {
    $user = User::_checkCredentials($patient_id, $password);
    if(!$user) {
      $flag = Patient::ValidateID($patient_id);
      if($flag) {
        return $user->Register($user);
      }
      else {
        $error_msg = "PatientID does not exist in the system";
        return false;
      }
    }
    $error_msg = "Patient Account already exists";
    return false;

  }
  public function register_Doctor($Doctor_id, $password) {
    $user = User::_checkCredentials($doctor_id, $password);
    if(!$user) {
      $flag = Doctor::ValidateID($doctor_id);
      if($flag) {
        return $user->Register($user);

      }
      else {
        $error_msg = "DoctorID does not exist in the system";
      }
    }
    $error_msg = 'Doctor Account already exists';
    return false;

  }

  public function update() {

  }

  public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

 public final function checkUser($id) {
    $db = $this->_db;
    $mysqli = $db->getConnection();
    $sql = "Select * from admin where username = '".$id."' ";
    $result = $mysqli->query($sql);
    if($result->num_rows == 0) {
      trigger_error('User already exists');
      return false;
    }
    return true;
 }

 public function save() {
   $db = $this->_db;
   $mysqli = $db->getConnection();
   $sql = 'Insert into admin values( ';
   $sql .= "$this->username, ";
   $sql .= "$this->name,  ";
   $sql .= "$this->email, ";
   $sql .= "$this->hospitalid, ";
   $sql .= $this->_time_created;
   $sql .= " )";
   
   if($mysqli->query($sql)) {
      $session['admin_id'] = $this->username;
   }
 }


}

?>
