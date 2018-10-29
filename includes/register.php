<?PHP

require_once("formvalidator.php");

class Adminreg
{
  protected $_email;    // using protected so they can be accessed
  protected $_password; // and overidden if necessary

  protected $_db;       // stores the database handler
  protected $_user;     // stores the user data

  protected $errors = NULL; //array to hold all of the errors
  //Defining the various errors
  const ERROR1 = "USER Exists";
  const ERROR2 = "password too short";
  const ERROR3 = "userid not defined";

  public $error_message = '';

  public function __construct()
  {
     $this->_db = Database::getInstance();
     session_start();
  }

function RegisterUser()
{
    if(!isset($_POST['submitted']))
    {
       return false;
    }

    $formvars = array();

    if(!$this->ValidateRegistrationSubmission())
    {
        return false;
    }
  }
}
?>
