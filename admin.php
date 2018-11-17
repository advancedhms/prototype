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
    $userid = intval($_POST['patient']);
    $password = ($_POST['patientPassword']);
    $patient = $admin->register_Patient($userid, $password);
    if($patient) {
      $pat = new Patient;
      $patientDetails = $pat->getDetails($userid);
      $to = $patientDetails['email'];
      $subject = "Account Details";
      $message = "Hello ". $patientDetails['name'];
      $message .= "! /n Below, you can find your temporary password. Please visit www.ahms.com to login your with patient id and the password. You can change it in your Account settings.  /n";
      $message .= "$password";

      $headers = "From: Advanced Hospital Group";
      mail($to,$subject,$message,$headers);
      echo "<script> alert('Patient account successfully created. Login details have been sent to Patient'); </script>";
    }
  }
  elseif (isset($_POST['submitDoctor'])) {
    $userid = intval($_POST['doctor']);
    $password = $_POST['doctorPassword'];

    $doctor = $admin->register_Doctor($userid, $password);
    if($doctor) {
      echo "<script> alert('Doctor account successfully created'); </script>";
    }
  }
  


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge"
          http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1"
          name="viewport">
    <title>Advanced Hospital Management System</title>
    <link href="css/bootstrap.min.css"
          rel="stylesheet">
    <link href="fontawesome/css/all.css"
          rel="stylesheet">
    <link href="css/style.css"
          rel="stylesheet">

          <style>
.tt-hint {

  display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

/*.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}*/
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
/*.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}*/
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
          </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand"
          href="#">AHMS</a>
      <div class="collapse navbar-collapse justify-content-center"
          id="navbarNav">
        <ul class="navbar-nav pull-right">
          <li class="nav-item active">
            <a class="nav-link"
                href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
                href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
                href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled"
                href="#">Disabled</a>
          </li>
        </ul>
      </div>
      <div class="form-inline">
        <a href="#"></a>
      </div>
    </nav><!--<nav class="navigate">
                  <ul class="nav justify-content-center">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                          </li>
                  </ul>
          </nav>-->
    <section>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Hello, <?php echo $adminDetails['name'] ?>!</h1>
          <p class="lead">This is your workspace for handling all administration in the Hospital.</p>
          <hr class="my-4">
          <p>Below is a recap on your recent interractions. Here you can monitor what goes in and out of your database</p>
        </div><!--container-->
      </div><!--jumbotron [opening title]-->
    </section>
    <div class="card text-center news">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer text-muted">
        7 days ago
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer text-muted">
        14 days ago
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer text-muted">
        21 days ago
      </div>
    </div>
    <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand"
          href="#">Ahms</a>
      <div class="collapse navbar-collapse justify-content-center"
          id="navbarNav">
        <ul class="navbar-nav nav-fill pull-right">
          <li class="nav-item active">
            <a class="nav-link" data-toggle="modal" href="#register">Register <i class="fas fa-plus-circle"></i><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
                href="#">Settings <i class="fas fa-cogs"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
                href="index.php">Logout <i class="fas fa-sign-out-alt"></i></a>
          </li>

        </ul>
      </div>
    </nav>

    <!--Modal Section-->
    <!--Register Form-->
    <div aria-hidden="true" aria-labelledby="exampleModalCenterTitle" class="modal fade" id="register" role="dialog"
        tabindex="-1">
      <div class="modal-dialog modal-dialog-centered"
          role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Register</h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-patient-tab" data-toggle="tab" href="#nav-patient" role="tab" aria-controls="nav-patient" aria-selected="true">Patient</a>
                    <a class="nav-item nav-link" id="nav-doctor-tab" data-toggle="tab" href="#nav-doctor" role="tab" aria-controls="nav-doctor" aria-selected="false">Doctor</a>
                    <a class="nav-item nav-link" id="nav-pharmacy-tab" data-toggle="tab" href="#nav-pharmacy" role="tab" aria-controls="nav-pharmacy" aria-selected="false">Pharmacy</a>
                  </div>
                </nav>
                <!--Patient Form-->
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-patient" role="tabpanel" aria-labelledby="nav-patient-tab">
                      <form action="admin.php" method="post">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Patient ID</label>
                              <input type="text" name="patient" class="patient tt-query form-control" autocomplete = "off" spellcheck="false" id="patient" placeholder="Patient ID">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Password</label>
                              <div class="input-group mb-3" id="show_hide_password">
                                  <input type="password" name="patientPassword" class="form-control" id="pass" placeholder="Password">
                                  <div class="input-group-append">
                                      <a href="" class="btn btn-outline-secondary"><i class="fas fa-eye-slash" aria-hidden="true"></i></i></a>

                                  </div>
                                </div>

                              <button type="button" onClick="generate()" class="btn btn-outline-success">Gen Password</button>
                            </div>
                            <button type="submit" name="submitPatient" class="btn btn-primary">Register</button>
                          </div>

                        </form>
                  </div>

                  <!--Doctor form-->
                  <div class="tab-pane fade" id="nav-doctor" role="tabpanel" aria-labelledby="nav-doctor-tab">
                    <form action="admin.php" method="post">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail5">Doctor ID</label>
                            <input type="text" name="doctor" class="doctor tt-query form-control" id="doctor" placeholder="Doctor ID">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <div class="input-group mb-3" id="show_hide_password1">
                                <input type="password" name="doctorPassword" class="form-control" id="passs" placeholder="Password">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-outline-secondary"><i class="fas fa-eye-slash" aria-hidden="true"></i></i></a>

                                </div>
                              </div>

                            <button type="button" onClick="generateDoc();" class="btn btn-outline-success">Gen Password</button>
                          </div>
                          <button type="submit" name="submitDoctor" class="btn btn-primary">Register</button>
                        </div>

                      </form>
                  </div>

                  <!--pharmacy form-->
                  <div class="tab-pane fade" id="nav-pharmacy" role="tabpanel" aria-labelledby="nav-pharmacy-tab">
                      <!--<form>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Email</label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Password</label>
                              <div class="input-group mb-3" id="show_hide_password">
                                  <input type="password" class="form-control" id="pass" placeholder="Password">
                                  <div class="input-group-append">
                                      <a href=""><i class="fas fa-eye" aria-hidden="true"></i></i></a>

                                  </div>
                                </div>

                              <button type="button"onClick="generate()" class="btn btn-outline-success">Gen Password</button>
                            </div>
                          </div>

                        </form>-->
                  </div>
                </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>

          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/password.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
      $(document).ready(function(){
    $('input.patient').typeahead({
        name: 'patient',
        remote:'ids.php?key=%QUERY',
        limit : 10
    });
    $('input.doctor').typeahead({
        name: 'doctor',
        remote:'ids-doctor.php?key=%QUERY',
        limit : 10
    });
});  

    </script>
  </body>
</html>
