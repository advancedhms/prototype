<!DOCTYPE html>
<html lang="en">
<head>
<style>
.user {
	
  display: inline-block;
  width: 110px;
  height: 110px;
  border-radius: 50%;
	
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}

.one {
  background-image: url('morocco.jpg');
}

#round{
	border-radius:30px;
	
}
#rbtn{
	border-radius:30px;
}
#pic{
	

}
.yes{
	border-width:1;
}
.navbar{
	width:100%;
	
}
.tt-hint {

display: block;
  width: 100%;
  height: calc(2.25rem + 2px);
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: .25rem;
  transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

/*.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}*/
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
/*.tt-suggestion {
  font-size: 24px;
  line-height: 24px;
  padding: 3px 20px;
}*/
.tt-suggestion.tt-is-under-cursor {
  background-color: #0097CF;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
</style>
<?php
$mysqli=mysqli_connect("localhost","root","","hms");


if(isset($_POST['save'])){
	
	$pateid=$_POST['patient'];
	$bp=$_POST['bp'];
	$pul=$_POST['pulse'];
	$tempe=$_POST['tempe'];
	
	$hei=$_POST['hei'];
	
	$wei=$_POST['wei'];
	
	$date=date("Y-m-d H:i:s");
	
	//echo "$date";
$sql="INSERT INTO pat_rep VALUES ($pateid,'$bp','$pul','$tempe','$hei','$wei','$date')";

$run=mysqli_query($mysqli,$sql);
if($run){
	
	//echo "Sarkcess";
}
else{
	//echo "Shaalor";
	
}
}
	 
	 
	 
 
?>

  <title>Nurse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Advanced Hospital Management System</title>
    <link href="css/bootstrap.min.css"
          rel="stylesheet">
    <link href="fontawesome/css/all.css"
          rel="stylesheet">
    <link href="css/style.css"
          rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
		
        <div  class="col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <nav class="navbar navbar-light navbar-expand-sm px-0 flex-row flex-nowrap">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div class="navbar-collapse collapse" id="navbarWEX">
                    <div class="nav flex-sm-column flex-row">
						<div class="mid">
							<div id="mid" class="user one">
							</div>
							<br>
							<h5>Nurse Joyce</h5>
						</div>
                        <a class="nav-item nav-link active" href="#">Home</a>
						
                       
						<br>
                        <a href="#" class="nav-item nav-link">Fill Vitals</a>
						<br>
					
                        <button id="but" class="btn btn-outline-danger"> Logout</button>
                    </div>
                </div>
            </nav>
        </div>
		
        <div class="col py-2">
						<br>
						<br>
						<h2>FILL VITALS</h2>
						<br>
<form method="post" >
    <div class="form-row">
    <div class="form-group col-md-6">
	<input type="text" name="patient" class="patient tt-query form-control" autocomplete = "off" spellcheck="false" id="patient" placeholder="Patient ID">
    </div>

    <div class="form-group col-md-6">
	<input type="text" class="tt-query form-control" name="bp" placeholder="BP">
    </div>
	
    <div class="form-group col-md-6">
	<input type="text" class="form-control" name="pulse" placeholder="Pulse">
    </div>

    <div class="form-group col-md-6">
	<input type="text" class="form-control" name="tempe" placeholder="Temperature">
    </div>

    <div class="form-group col-md-6">
	<input type="text" class="form-control" name="hei" placeholder="Height">
    </div>

    <div class="form-group col-md-6">
	<input type="text" class=" form-control" name="wei" placeholder="Weight">
    </div>

    <div class="form-group col-md-6">
	<input type="submit" class="form-control btn btn-outline-success" name="save" value="Save">
    </div>
    </div>
</form>
        </div>
    </div>
</div>  

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
      $(document).ready(function(){
    $('input.patient').typeahead({
        name: 'patient',
        remote:'ids.php?key=%QUERY',
        limit : 10
    });
    $('input.doctor').typeahead({
        name: 'doctor',
        remote:'ids-doctor.php?key=%QUERY',
        limit : 10
    });
});  
</script>
</body>
</html>
