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
</style>
<?php
$mysqli=mysqli_connect("localhost","root","","cms");
$time=date('h:i:s');

if(isset($_POST['save'])){
	
	$pateid=$_POST['pateid'];
	$bp=$_POST['bp'];
	$pul=$_POST['pulse'];
	$tempe=$_POST['tempe'];
	
	$hei=$_POST['hei'];
	
	$wei=$_POST['wei'];
	
	$date=date("Y-m-d");
	
	//echo "$date";
$sql="INSERT INTO pat_rep VALUES ('$pateid','$bp','$pul','$tempe','$hei','$wei','$date','$time')";

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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

	<input type="text" class="col-md-2 form-control" name="pateid" placeholder="Patient Id">
	<br><br>
	<input type="text" class="col-md-1 form-control" name="bp" placeholder="BP">
	<br><br>
	<input type="text" class="col-md-2 form-control" name="pulse" placeholder="Pulse">
	<br><br>
	<input type="text" class="col-md-2 form-control" name="tempe" placeholder="Temperature">
	<br><br>
	<div class="row">
	<div class="col col-md-2 ">
	<input type="text" class="form-control" name="hei" placeholder="Height">
	<br><br>
	</div>
	<div class="col col-md-2 ">
	<input type="text" class=" form-control" name="wei" placeholder="Weight">
	<br><br>
	</div>
	</div>
	<input type="submit" class="col-md-1 form-control btn btn-outline-success" name="save" value="Save">
</form>
        </div>
    </div>
</div>  
</body>
</html>
