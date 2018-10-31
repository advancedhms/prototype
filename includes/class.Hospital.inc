
<?php
include 'class.Database.inc';
/**
 *
 */
class Hospital
{
  protected $_db; //Holds an instance of the database class
  protected $_hospitalid; //holds a value for the hospital id

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public static function ValidateID($id) {
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql = "SELECT * from hospital where hospital_id = '".$id."' '";
    $result = $mysqli->query($sql);
    if(!$result->num_rows() == 0) {
      return TRUE;
    }
    return false;
  }
}


 ?>
