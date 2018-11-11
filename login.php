<!DOCTYPE html>
<html lang="en">
<head>
<style>
.user {
	
  display: inline-block;
  width: 250px;
  height: 250px;
  border-radius: 50%;
	
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}

.one {
  background-image: url('morocco.jpg');
 }
.mid{
	padding-top:3%;
	text-align:center;
	padding-bottom:4%;
	
}
.card{
	
	
  border-radius: 10px;
  background: #000; // without a background or border applied you won't be able to see if its rounded

	
}
.row{
	height:20%;
	
}

.card-columns{
	
	    margin-left: 500px; /* Added */
        float: none; /* Added */
        margin-top: 200px; /* Added */
}
#round{
	border-radius:30px;
	
}
#rbtn{
	border-radius:30px;
}
</style>
<?php
$mysqli=mysqli_connect("localhost","root","","cms");

if(isset($_POST['send'])){
	$docid=$_POST['docid'];
	$patid=$_POST['patid'];
	$disease=$_POST['disease'];
	$prescrip=$_POST['prescrip'];
	$date=date("Y-m-d");
$sql="INSERT INTO doctors_deduction(Doc_ID,Pat_ID,Disease,Prescription,accepted,entry_date) VALUES ('$docid','$patid','$disease','$prescrip','0','$date')";

$run=mysqli_query($mysqli,$sql);
if($run){
	
	echo "Sarkcess";
}
else{
	echo "Shaalor";
	
}
}

?>

  <title>Doctor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-light sticky-top bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

          </ul>
          <form class="form-inline mt-2 mt-md-0">
            
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
          </form>
        </div>
      </nav>
    </header>
  
<div class="container-fluid">


<section class="section">
<br/>
<div class="mid">
<div id="mid" class="user one">
</div>
<br>
<br>
<h4>Doctor Akoto</h4>
</div>


    <!--Grid row-->
    <div class="row">
        <!--Grid column-->
		<div class="col-md-3 mb-4">
		</div>
        <div class="col-md-3 mb-4">
            <div class="card card-image "  style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20%2873%29.jpg);">
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h6 class="pink-text"><i class="fa fa-pie-chart"></i><strong> History</strong></h6>
                        <h3 class="card-title py-3 font-weight-bold"><strong></strong>View Health History</h3>
                        <p class="pb-3"></p>
                        <a class="btn btn-success btn-lg " id="round" data-toggle="modal" data-target="#SreportsModal">View Reports</a>
                    </div>
                </div>
            </div>
			<div class="modal fade " id="SreportsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog  modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="myLargeModalLabel">Search Health History</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</div>
						<div class="modal-body">
							<form method="post" action="searchRes.php">
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" name="pat_id" placeholder="Enter Patient ID">
									</div>
									<div class="col">
										<button type="submit" name="id_search" class="btn btn-primary col-md-10">Search</button>
									</div>
								</div>
								<br/>
							

								
								<br/>
								</form>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							
						</div>
					</div>
				</div>
			</div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
		
        <div class="col-md-3 mb-4">
            <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/City/6-col/img%20%2847%29.jpg);">
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h6 class="green-text"><i class="fa fa-eye"></i><strong>Updates</strong></h6>
                        <h3 class="card-title py-3 font-weight-bold"><strong>Update Patient History</strong></h3>
                        <p class="pb-3"></p>
                        <a class="btn btn-success btn-lg " id="rbtn" data-toggle="modal" data-target="#GreportsModal">Update History</a>
                    </div>
                </div>
            </div>
			<div class="modal fade " id="GreportsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog  modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Patient Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
					<form method="post">
						<input type="text" class="col-md-4 form-control" name="docid" placeholder="Doctor ID">
						<br>
						<br>
						<input type="text" class="col-md-4 form-control" name="patid" placeholder="Patient ID">
						<br><br>
						<input type="text"  class="col-md-6 form-control" name="disease" placeholder="Disease">
						<br><br>
						<input type="text" class="col-md-8 form-control" name="prescrip" placeholder="Prescription">
						<br><br>
						

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit"  class="btn btn-outline-primary" name="send" value="Send">
						</div>
					</form>
					</div>
				</div>
			</div>
        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>


</div>
    <footer class="footer">
      <div class="container">
			
      </div>
    </footer>
</body>
</html>
