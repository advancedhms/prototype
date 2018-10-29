<?php

function __autoload($class_name) {
include 'class.' . $class_name . '.inc';
}

  //include 'includes/class.user.inc';
  include 'includes/register.php';

  $user = new User();
  if(isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $error = " ";
    $userinfo = $user->login($user_id, $password);
    session_start();
    if($userinfo) {
      if(preg_match('/pat$/', $userinfo)) {
        $_SESSION['user_id'] = $userinfo;
        header('Location: patient.php');
      }
      elseif (preg_match('/admin$/', $userinfo)) {
        $_SESSION['user_id'] = $userinfo;
        header('Location: admin.php');
      }
      elseif (preg_match('/pharm$/', $userinfo)) {
        $_SESSION['user_id'] = $userinfo;
        header('Location: pharm.html');
      }

    }
    else {
      $error =  $user->error_message;
    }

    }
    ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Advanced Hospital Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/other.css"/>

</head>

<body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card card-signin flex-row my-5">
            <!--<div class="card-img-left d-none d-md-flex">
               Background image for card set in CSS!
            </div>-->
            <div class="card-body">
              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-Login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-patient" aria-selected="true">Login</a>
                    <a class="nav-item nav-link" id="nav-Register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-doctor" aria-selected="false">Register</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                    <span><?php echo $error; ?></span>
                    <h5 class="card-title text-center">Login</h5>
                    <form class="form-signin" method="post" action="index.php">
                      <div class="form-label-group">
                        <input type="text" name="user_id" id="userid" class="form-control" placeholder="Username" required autofocus>
                        <label for="inputUserame">UserID</label>
                      </div>

                      <!--<div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                        <label for="inputEmail">Email address</label>
                      </div>-->

                      <hr>

                      <div class="form-label-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>

                      <!--<div class="form-label-group">
                        <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                        <label for="inputConfirmPassword">Confirm password</label>
                      </div>-->

                      <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Submit</button>
                      <!--<a class="d-block text-center mt-2 small" href="#">Sign In</a>-->
                      <hr class="my-4">
                      <!--<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                      <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>-->
                    </form>
                  </div>

                  <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                    <span><?php echo $error; ?></span>
                    <h5 class="card-title text-center">Register</h5>
                  <form class="form-signin" method="post" action="index.php">
<div class="form-label-group">
  <input type="text" name="user_id" id="userid" class="form-control" placeholder="name" required autofocus>
  <label for="inputname">Fullname</label>
</div>
<hr>
                      <div class="form-label-group">
                        <input type="text" name="user_id" id="userid" class="form-control" placeholder="Username" required autofocus>
                        <label for="inputUserame">Username</label>
                      </div>

                      <!--<div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                        <label for="inputEmail">Email address</label>
                      </div>-->

                      <hr>

                      <div class="form-label-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address"  required value="">
                    <label for="inputEmail">Email address</label>
                  </div>

                  <hr>
<div class="form-label-group">
  <input type="ID" name="id" id="id" class="form-control" placeholder="Id" required>
  <label for="inputPassword">Hospital ID</label>
</div>
<hr>

                      <div class="form-label-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>

                      <!--<div class="form-label-group">
                        <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                        <label for="inputConfirmPassword">Confirm password</label>
                      </div>-->
<hr>
                      <div class="form-label-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Confirm Password</label>
                      </div>

                      <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Submit</button>
                      <!--<a class="d-block text-center mt-2 small" href="#">Sign In</a>-->
                      <hr class="my-4">
                      <!--<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                      <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>-->
                    </form>
                  </div>
                </div>



            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/script.js" ></script>
</body>
</html>
