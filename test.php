<?php
/*function __autoload($class_name) {
  include 'class.' . $class_name . '.inc';
}
*/
include_once 'includes/classes.php';

  session_start();
  $userid = '';
  $password = '';
  $admin = new Admin;
  $adminDetails = $admin->getDetails($_SESSION['user_id']);


  if(isset($_POST['submitPatient'])) {
      echo "this is a test";
    $userid = intval($_POST['patient']);
    $password = ($_POST['patientPassword']);
    echo var_dump('userid');
    $patient = $admin->register_Patient($userid, $password);
    if($patient) {
      echo "<script> alert('Patient account successfully created'); </script>";
      header('Location: index.php');
    }
  }
  elseif (isset($_POST['submitDoctor'])) {
    $userid = $_POST['doctorID'];
    $password = $_POST['doctorPassword'];

    $doctor = $admin->register_Doctor($user_id, $password);
    if($doctor) {
      echo "<script> alert('Doctor account successfully created'); </script>";
    }
  }
  


 ?>