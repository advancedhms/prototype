<?php 
	require 'includes/classes.php';
  session_start();
	//$user = new User;
	//echo "<tt><pre>".var_export($user, true)."</pre></tt>";

	    $data = array(
	    'id' => 'ikeadmin',
        'name' => 'Kwame Owusu',
        'email' => 'nanayawasuako@gmail.com',
        'hospitalid' => 'hosp1214',
        'password' => '2bhjsodir',        
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
      $new_user = new Admin;
    
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
      $new_admin_user = new User($data);

      echo "<tt><pre>". var_export($new_admin_user, true)   ."</pre></tt>";
      $user = $new_admin_user->register();
      if($user && $data['id'] == $_SESSION['user_id']) {
        header('Location: admin.php');
      }
      else {
        echo "Registeration unsuccesfull";
      }
?>