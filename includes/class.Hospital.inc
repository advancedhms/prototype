
<?php
//include 'class.Database.inc';
/**
 *
 */
class Hospital
{
  protected $_db; //Holds an instance of the database class
  protected $_hospitalid; //holds a value for the hospital id

  function __construct($hospitalid)
  {
    $this->_hospitalid = $hospitalid;
  }

   /**
  *magic get method
  *returns property
  **/
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
    if('hospitalid' == $name) {
      $this->$name = $value;
      return;
    }
    trigger_error('Unable to access property via __set:'.$name);
      return NULL;
  }

  function ValidateID() {
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $id = $this->hospitalid;
    $sql = 'SELECT * FROM hospital where hospital_id = "'.$id.'" ';
    $result = $mysqli->query($sql);
    if($row = $result->fetch_assoc()) {
      return true;
    }
    trigger_error("Unable to validate hospitalid");
    return false;
  }

  public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}


 ?>
