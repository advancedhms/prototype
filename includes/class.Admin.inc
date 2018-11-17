<?php
/*require_once 'class.Database.inc';
include 'class.User.inc';
include 'class.Patient.inc';
*/
class Admin{
  protected $_username;
  public $name;
  public $email;
  public $hospitalid;
  protected $_db;
  protected $_time_created;
  public $error_msg = '';

  public function __construct($data = array()) {
    $this->_time_created = time();
    if(!is_array($data)) {
      trigger_error('unable to construct class with: '.get_class($data));
    }
      if(count($data) > 0)   {
        foreach ($data as $name => $value) {
          if(in_array($name, array(
            'username',
            'db',
            'time_created',
          ))) {
            $name = '_' . $name;
          }
          $this->$name = $value;
        }
      }   
      
    /*if($this->checkUser($this->username)) {
      $this->save();
    }*/
  }

  /**
  *magic get method
  *returns property
  **/
  function __get($name) {

    // Attempt to return a protected property by name
    $protected_property_name = '_'. $name;
    if(property_exists($this, $protected_property_name)) {
      return $this->$protected_property_name;
    }

      trigger_error('Unable to access property via __get:'.$name);
      return NULL;
  }

  /**
  *magic set method
  *takes a property value and sets the value
  **/
  function __set($name, $value) {
    if('username' == $name) {
      $this->$name = $value;
      return;
    }
    trigger_error('Unable to access property via __set:'.$name);
      return NULL;
  }
  /*function __clone() {
    $this->_time_created = time();
  }
  

  /**
  * Magic toSring
  * returns a display of patient data
  **/

  /*function __toString() {
    return $this->display();
  }*/

  /**
  *Display method
  *returns a concatenated string containing properties
  **/

  function display() {
    $output = '';
    $output .= 'Admin ID = ';
    $output .= $this->username;

    $output .= '</br>';
    $output .= 'Name = ';
    $output .= $this->name;

    # remaining goes here
    return $output;
  }

  

  public function register_Patient($patient_id, $password) {

    $usernew = new User(array(
      'id' => $patient_id,
      'password' => $password,
      'user_status' => 3,
    ));
    $user = $usernew->_checkCredentials($patient_id, $password);
    if(!$user) {
      $patient = new Patient;
      $flag = $patient->ValidateID($patient_id);
      if($flag) {
        return $usernew->saveUser();
      }
      else {
        trigger_error("PatientID does not exist in the system");
        return false;
      }
    }
    trigger_error("Patient Account already exists");
    return false;
  }
  public function register_Doctor($doctor_id, $password) {
    $usernew = new User(array(
      'id' => "$doctor_id",
      'password' => "$password",
      'user_status' => 2,
    ));
    $user = $usernew->_checkCredentials($doctor_id, $password);
    if(!$user) {
      $doctor = new Doctor;
      $flag = $doctor->ValidateID($doctor_id);
      if($flag) {
        return $usernew->saveUser();
      }
      else {
        $error_msg = "DoctorID does not exist in the system";
        return false;
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

 function checkUser($id) {
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql = "SELECT * FROM admin where username = '$id' ";
    $result = $mysqli->query($sql);
    if($result->num_rows == 0) {
      return true;
    }
   $this->error_msg = "User already Exists";
    return false;
 }

 function saveDetails() {

   $db = Database::getInstance();
   $mysqli = $db->getConnection();
   $username = $this->_username;
   $name = $this->name;
   $email = $this->email;
   $hospitalid = $this->hospitalid;

   if($this->checkUser($username)) {
    $hospital = new Hospital($hospitalid);
    if($hospital->ValidateID()){
      $sql = "INSERT INTO admin "
         ." VALUES('$username', '$name' ,'$email' , '$hospitalid')";
                
         if($mysqli->query($sql)) {
            $session['admin_id'] = $username;
            return true;
         }
         else {
          trigger_error("unable to add admin");
          return false;
         }
    }
    return false;
   }
   trigger_error("Unable to save Details");
   return false;


} 

function getDetails($id = '') {
  if($id == '') {
   $id = $this->username;
  }
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $sql = "SELECT * FROM admin WHERE username = '$id'";

  $result = $mysqli->query($sql);
  return $result->fetch_assoc();
}

  //final public function save() {}

}

?>
