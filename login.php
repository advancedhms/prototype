<?php
  include 'includes/user.class.php';
  $user = new User();
  if(isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    echo "$user->error_message";
    $userinfo = $user->login($user_id, $password);
    if($userinfo) {
      echo "<script> alert('Login successful') </script>";
      header('Location: patient.html');
    }

    }


 ?>
