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

/*
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
  

*/

$user_id = 1005;
$password = 'kuiler';
$error = " ";
$user = new User(array(
  'id' => $user_id,
  'password' => $password,
));
$userinfo = array();
$userinfo = $user->login();

if($userinfo) {
  if($userinfo['user_status'] == 3) {
    $_SESSION['user_id'] = $userinfo['user_id'];
    header('Location: patient.php');
  }
  elseif ($userinfo['user_status'] == 1) {
    $_SESSION['user_id'] = $userinfo['user_id'];
    header('Location: admin.php');
  }
  elseif ($userinfo['user_status'] == 2) {
    $_SESSION['user_id'] = $userinfo['user_id'];
    header('Location: doctor.php');
  }
  elseif ($userinfo['user_status'] == 4) {
    $_SESSION['user_id'] = $userinfo['user_id'];
    header('Location: pharm.html');
  }
  else {
    header('Location: index.php');
  }

}
else {
  echo "<span>$user->error_message</span>";
  $doc = new DOMDocument();
  $a = $doc->getElementById('error');
}
 ?>