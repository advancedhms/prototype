<?php
  /**
   *
   */
   /*include 'class.Database.inc';
   include 'class.Admin.inc';
   include 'class.Hospital.inc';*/
  class User
  {

    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary
    protected $_id;
    public $name;
    protected $_hospitalid;
    protected $_db;       // stores the database handler
    public $user;     // stores the user data
    protected $_time_created; // Stores the time the user was created

  	protected $errors = NULL; //array to hold all of the errors
    //Defining the various errors
    const ERROR1 = "User not found";
    const ERROR2 = "password incorrect";
    const ERROR3 = "userid incorrect";

    public $error_message = '';


    public function __construct($data = array()) {
    $this->_time_created = time();
    if(!is_array($data)) {
      trigger_error('unable to construct class with: '.get_class($data));
    }
      if(count($data) > 0)   {
        foreach ($data as $name => $value) {
          if(in_array($name, array(
            'email',
            'password',
            'id',
            'hospitalid',
          ))) {
            $name = '_' . $name;
          }
          $this->$name = $value;
        }
      }   
      
    /*if($this->checkUser($this->username)) {
      $this->save();
    }*/
  }

    function __get($name) {

    // Attempt to return a protected property by name
    $protected_property_name = '_'. $name;
    if(property_exists($this, $protected_property_name)) {
      return $this->$protected_property_name;
    }

      trigger_error('Unable to access property via __get:'.$name);
      return NULL;
  }

  /**
  *magic set method
  *takes a property value and sets the value
  **/
  function __set($name, $value) {
    if('id' == $name) {
      $this->$name = $value;
      return;
    }
    trigger_error('Unable to access property via __set:'.$name);
      return NULL;
  }

    public function login()
    {
        $user_id = $this->_id;
        $password = $this->_password;
        $user = $this->_checkCredentials($user_id, $password);
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION['user_id'] = $user['user_id'];
            return $user['user_id'];
        }

        return false;
    }

    protected function _checkCredentials($user_id, $password)
    {
      $db = Database::getInstance();
      $mysqli = $db->getConnection();
      $sql = 'SELECT * from users where user_id = "'.$user_id.'" ';
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

    public function register() {
        $regdata = array(
        'username' => "$this->_id",
        'name' => "$this->name",
        'email' => "$this->_email",
        'hospitalid' => "$this->_hospitalid",
        );

        $admin = new Admin($regdata);
        $new_admin = $admin->saveDetails();  
			 if($new_admin) {

          $user = $this->saveUser();

          if($user) {
            return $this->login();
          }
          
          }

          return false;
       }
      

    public function getUser()
    {
        return $this->_user;
    }
    public static function getInstance() {
      if(!self::$_instance) {
        self::$_instance = new self();
      }
      return self::$_instance;
    }

    /*public function register($data = array()) {
      $db = $this->_db;
      $mysqli->$db->getConnection();
      $this->_id = $data['user_id'];
      $this->_name = $data['name'];
      $this->_hospitalid = $data['hospitalid'];
      $this->_email = $data['email'];
      $sql = "Insert into admin values ('$this->_id','$this->_name','$this->_email','$this->_hospitalid')";
      $result = $mysqli->query($sql);
      if($row = $result->fetch_assoc()) {
        $sql = "Insert into users values('$this->_id','$this->_password')";
        $result = $mysqli->query($sql) ;
        if($row1 = $result->fetch_assoc()) {
          return $row['userid'];
        }
        return false;
      }
      return false;
    }*/

    function saveUser() {
      $db = Database::getInstance();
      $mysqli = $db->getConnection();

      $user_id = $this->_id;
      $password = $this->_password;
      $sql = "INSERT INTO users "
      . "VALUES ('$user_id', '$password') ";


      if($mysqli->query($sql)) {
        $_SESSION['user_id'] = $user_id;
        return true;
      }

      $this->error_msg = 'Unable to register user';
      return false;
    }
  }


 ?>
