
<?php
//include 'class.Database.inc';
/**
 *
 */
class Hospital
{
  protected $_db; //Holds an instance of the database class
  protected $_hospitalid; //holds a value for the hospital id

  function __construct()
  {

  }

  public static function ValidateID($id) {
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql = "Select * from hospital where hospital_id = '$id' ";
    $result = $mysqli->query($sql);
    if($row = $result->fetch_assoc()) {
      return true;
    }
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
