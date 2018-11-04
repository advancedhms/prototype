<?php 
	require 'includes/classes.php';

	//$user = new User;
	//echo "<tt><pre>".var_export($user, true)."</pre></tt>";

	    $data = array(
	    'username' => 'admin',
        'name' => 'Isaac Botwe',
        'email' => 'isaacbotwe7@gmail.com',
        'hospitalid' => 'hosp1234',
        
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
      $new_user = new Admin(array(
        'username' => 'isaacadmin',
        'name' => 'Isaac Asuako',
        'email' => 'isaacbotwe@gmail.com',
        'hospitalid' => 'hosp1234',
        
      ));
    
     /*$new_user->username = $data['username'];
     $new_user->name = $data['name'];
     $new_user->email=$data['email'];
     $new_user->hospitalid=$data['hospitalid'];
     $new_user->save();
*/
      echo "<tt><pre>".var_export($new_user, true)."</pre></tt>";
      echo $new_user->display();
      $user = $new_user->saveDetails();
      if($user) {
        echo "Registration Succesfull";
      }
      else {
        echo "Registeration Unsuccessful";
      }
?>