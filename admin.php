<?php
/*function __autoload($class_name) {
  include 'class.' . $class_name . '.inc';
}
*/
include_once 'includes/classes.php';
header('Content-type: application/json; charset=utf-8');
  session_start();
  $userid = '';
  $password = '';
  $admin = new Admin;

  if(isset($_POST['submitPatient'])) {
    $userid = $_POST['patientID'];
    $password = $_POST['patientPassword'];

    $patient = $admin->register_Patient($userid, $password);
    if($patient) {
      echo "<script> alert('Patient account successfully created'); </script>";
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
  

  
  /*if(isset($_POST['one'])){
    $json = array();
    while ($ids){
       $user=$ids;
        array_push($json,$user);
    }
    echo json_encode($json, true);
    
  }*/

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
          <h1 class="display-4">Hello, <?php echo $_SESSION['name']; ?>!</h1>
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
                href="#">Update <i class="fas fa-pen-square"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
                href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled"
                href="#">Disabled</a>
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
                              <input type="text" name="patientID" class="form-control" id="patient" placeholder="Patient ID">
                              <div id="patientids"></div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Password</label>
                              <div class="input-group mb-3" id="show_hide_password">
                                  <input type="password" name="patientPassword" class="form-control" id="pass" placeholder="Password">
                                  <div class="input-group-append">
                                      <a href="" class="btn btn-outline-secondary"><i class="fas fa-eye-slash" aria-hidden="true"></i></i></a>

                                  </div>
                                </div>

                              <button type="button"onClick="generate()" class="btn btn-outline-success">Gen Password</button>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                          </div>

                        </form>
                  </div>

                  <!--Doctor form-->
                  <div class="tab-pane fade" id="nav-doctor" role="tabpanel" aria-labelledby="nav-doctor-tab">
                    <form action="admin.php" method="post">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Doctor ID</label>
                            <input type="text" name="doctorID" class="form-control" id="Patient" placeholder="Doctor ID">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" name="doctorPassword" class="form-control" id="pass" placeholder="Password">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-outline-secondary"><i class="fas fa-eye-slash" aria-hidden="true"></i></i></a>

                                </div>
                              </div>

                            <button type="button"onClick="generate()" class="btn btn-outline-success">Gen Password</button>
                          </div>
                          <button type="submit" name="registerDoctor" class="btn btn-primary">Register</button>
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
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
