<?php
  /**
   *
   */
   include 'class.Database.inc';
  class User
  {

    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary

    protected $_db;       // stores the database handler
    protected $_user;     // stores the user data

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

    public function getUser()
    {
        return $this->_user;
    }

    public function register($data = array()) {
      $db = $this->_db;
      $mysqli->$db->getConnection();
      $sql = "Insert into admin values ('$data['user_id']','$data['name']','$data['hospital_id']','$data['email']')";
      $result = $mysqli->query($sql);
      if($row = $result->fetch_assoc()) {
        $sql = "Insert into users values('$data['user_id']','$data['password']')";
        $result = $mysqli->query($sql) ;
        if($row1 = $result->fetch_assoc()) {
          
        }
      }
    }
  }

 ?>
