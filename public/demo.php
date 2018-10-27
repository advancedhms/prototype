<?php

function my_autoloader($class) {
    include '../includes/class.' . $class . '.inc';
}

spl_autoload_register('my_autoloader');

// Or, using an anonymous function as of PHP 5.3.0
spl_autoload_register(function ($class) {
    include '../includes/class.' . $class . '.inc';
});

try {
$patient = Patient::login('10576729','2b/not2b');

echo '<h2>Testing class with a login</h2>';
echo $patient;

echo '</br>';
echo '<tt><pre>'. var_export($patient, TRUE).'</pre></tt>';
}
catch(ExceptionPatient $e) {
	echo $e;
}


?>
