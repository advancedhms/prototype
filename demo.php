
<?php

include_once 'includes/classes.php';
 $id = 1006858;
 $password = 'kuilerf';
 
 $admin = new Admin;
 $user = $admin->register_Patient($id, $password);


 echo var_dump($user);

 $patientid = 1005;
 $records = Record::getRecords($patientid);
 echo "<tt><pre>".var_export($records, true) ."</pre></tt>";

 /*$keys = array_keys($records);
for($i = 0; $i < count($records); $i++) {
    echo $keys[$i] . "{<br>";
    foreach($records[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "}<br>";
}*/
            $db = Database::getInstance();
            $mysqli = $db->getConnection();
            $sql = "SELECT * FROM record WHERE patient_id = '$patientid'";
            $result = $mysqli->query($sql);

while($row = $result->fetch_array()) {
  echo $row[0];
  echo "<br/>";
  echo $row[1];
  echo "<br/>";
  echo $row[2];
  echo "<br/>";
  echo $row[3];
  echo "<br/>";
  echo $row[4];
  echo "<br/>";
}

 /*foreach($records as $record) {
   echo "<table>";
   echo  "<tr>";
   echo "<td>";
    echo $record[0]; 
    echo "</td>";
   echo "<td>";
    echo $record[1]; 
    echo "</td>";
   echo "<td>";
  echo $record[2]; 
  echo "</td>";
   echo "<td>";
   echo $record[3];
   echo "</td>";
   echo "<td>";
   echo $record[4];
   echo "</td>";
   echo "<td>";
   echo $record[5]; 
   echo "</td>";
   echo "<td>";
   echo $record[6];
   echo "</td>";
 echo "</tr>";
   
   
   echo "</table>";
 }*/

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>

</head>
<body>
<div class="row">
      <div class=".col-md-6">
        <div class="jumbotron">
        <h1>Ajax Search Box using Node and MySQL <small>Codeforgeek Tutorial</small></h1>
         <button type="button" class="btn btn-primary btn-lg">Visit Tutorial</button>
      </div>
  </div>
  <div class=".col-md-6">
    <div class="panel panel-default">
    <div class="bs-example">
        <input type="text" name="patient" class="patient tt-query" autocomplete="off" spellcheck="false" placeholder="Type your Query">
    </div>
    <input type="text" id="password">
    <button onclick="$('#password').val(password.generate());">
  Generate Password
</button>
  </div>
  </div>
  </div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/password.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.patient').typeahead({
        name: 'patient',
        remote:'ids.php?key=%QUERY',
        limit : 10
    });
});
</script>
</body>
</html>