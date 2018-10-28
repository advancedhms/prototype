<?php
include 'class.Database.inc';
include 'class.User.inc';
include 'class.Patient.inc';

class Admin extends User {
  protected $username;
  protected $admin_id;


  public $error_msg = '';

  public function __construct($id) {

    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    $sql = "SELECT * from Admin where adminid = '".$id."' ";
    $result = $mysqli->query($sql);
    if ($row = $result->fetch_assoc()){
        $this->admin_id = $id;
        return self::getInstance($row);
    }
  }

  public function __construct($data = array()) {
    if(!is_array($data)) {
      trigger_error('unable to construct class with: '.get_class($data));
    }
    if(count($data) > 0) {
      foreach ($data as $name => $value) {
        $this->name = $value;
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
        return User->Register($user);
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
      $flag = Doctor::ValidateID($patient_id);
      if($flag) {
        return User->Resister($user);
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

  public static function getInstance($data = array()) {
   return new Admin($data);
 }


}

?>
