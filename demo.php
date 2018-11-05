<?php 
	require 'includes/classes.php';
  session_start();
	//$user = new User;
	//echo "<tt><pre>".var_export($user, true)."</pre></tt>";

	    $data = array(
	    'id' => 'markadmin',
        'password' => 'kuiler',        
      );

     /* $new_user = $user->register($data);
     echo "<br/>";*/
    /* $regdata = array(
          'username' => 'admin',
          'name' => 'Isaac Botwe',
          'email' => "$data['email']",
          'hospitalid' => "$data['hospitalid']",
      ); */
     /*$new_user = new Admin(array(
	    'username' => 'admin',
        'name' => 'Isaac Botwe',
        'email' => 'isaacbotwe7@gmail.com',
        'hospitalid' => 'hosp1234',
        
      ));*/
      $user = new User($data);
    
     /*$new_user->username = $data['username'];
     $new_user->name = $data['name'];
     $new_user->email=$data['email'];
     $new_user->hospitalid=$data['hospitalid'];
     $new_user->save();

      echo "<tt><pre>".var_export($new_user, true)."</pre></tt>";
      echo $new_user->display();
      echo "<br/>";
      $user = $new_user->saveDetails();
      if($user) {
        echo "Registration Succesfull";
      }
      else {
        echo "Registeration Unsuccessful";
      }
      echo "<br/>";*/
    /*  $new_admin_user = new User($data);

      echo "<tt><pre>". var_export($new_admin_user, true)   ."</pre></tt>";
      $user = $new_admin_user->register();
      if($user && $data['id'] == $_SESSION['user_id']) {
        header('Location: admin.php');
      }
      else {
        echo "Registeration unsuccesfull";
      }*/

      echo "<tt><pre>". var_export($user, true)   ."</pre></tt>";
      $new_user = $user->login();
      if($new_user) {
        header('Location: admin.php');
      }
      else {
        echo "Login unsuccessfull";
      }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css"
          rel="stylesheet">
    <link href="fontawesome/css/all.css"
          rel="stylesheet">
    <link href="css/style.css"
          rel="stylesheet">

</head>
<body>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Patient ID</label>
                              <input type="text" name="patientID" class="form-control" id="patient" placeholder="Patient ID">
                              <div id="patientids"></div>
                            </div>
                            </div>

    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/script.js" ></script>
</body>
</html>