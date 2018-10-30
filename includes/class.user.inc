<?php
  /**
   *
   */
   include 'class.Database.inc';
  class User
  {

    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary
    protected $_id;
    protected $_name;
    protected $_hospitalid;
    protected $_db;       // stores the database handler
    protected $_user;     // stores the user data
    protected $_time_created; // Stores the time the user was created

  	protected $errors = NULL; //array to hold all of the errors
    //Defining the various errors
    const ERROR1 = "User not found";
    const ERROR2 = "password incorrect";
    const ERROR3 = "userid incorrect";

    public $error_message = '';


    public function __construct()
    {
       $this->_db = Database::getInstance();
       session_start();
    }

    public function login($user_id, $password)
    {
        $this->_password = $password;
        $user = $this->_checkCredentials($user_id, $password);
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION['user_id'] = $user['userid'];
            return $user['userid'];
        }

        return false;
    }

    protected function _checkCredentials($user_id, $password)
    {
      $db = $this->_db;
      $mysqli = $db->getConnection();
      $sql = 'SELECT * from users where userid = "'.$user_id.'" ';
      $result = $mysqli->query($sql);

        if ($row = $result->fetch_assoc()) {
            $user = $row;
            if($user['password'] == $password) {
                return $user;
            }
            else {
              $this->error_message = 'Password incorrect';
              return false;
            }

        }
        else {
          $this->error_message = 'Incorrect userID';
          return false;
        }
        return false;
    }

    public function register($data = array()) {
      $this->_time_created = time();
      if(!is_array($data)) {
        trigger_error('unable to construct class with: '.get_class($data));
      }
      if(count($data) > 0) {
				foreach($data as $name => $value) {
					if(in_array($name,array(
						'id',
						'name',
            'email',
						'hospitalid',
						'password',

					))) {
						$name = '_'.$name;
					}
					$this->$name = $value;
				}
			}

      if(Hospital::ValidateID($this->$_hospitalid)) {
        $regdata = array(
          'admin_id'=>$this->_id,
          'username'=$this->_name,
          'email'=$this->_email,
          'hospitalid'=$this->_hospitalid,
      );
        $this->_user = new Admin($regdata);
        if($this->_user) {
          $mysqli = $this->_db->getConnection();
          $sql = "Insert into users values ('$this->_id','$this->_password')";
          $result = $mysqli->query($sql);
          if($row = $result->fetch_assoc()) {
            $flag = "Account has been created";
            return $flag;
          }
          return false;
        }
        return false;
      }
      return false;
    }

    public function getUser()
    {
        return $this->_user;
    }
  }

 ?>
