<?php
include 'class.Database.inc';
include 'class.User.inc';
include 'class.Patient.inc';

class Admin extends User {
  protected $username;
  protected $password;
  protected $user_id;
  protected $user;

  public $error_msg = '';

  public function register_Patient($patient_id, $password) {
    $user = User::_checkCredentials($patient_id, $password);
    if(!$user) {
      $flag = Patient::ValidateID($patient_id);
      if($flag) {
        return User->Resister($user);
      }
      else {
        $error_msg = "PatientID does not exist in the system";
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


}

?>
