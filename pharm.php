<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script >
function openTab(evt, evtname) {
    // Declare all variables
    var i, tabcontent, links;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"


    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(evtname).style.display = "block";
    evt.currentTarget.className += "active";
}
 $(document).ready(function(){
	 $(".accept").click(function() {
    var $row = $(this).closest("tr");    // Find the row
	$id= $row.find(".id").text(); // Find the text

	$("#outPut").val($id);

	
	
	
});
 
});

 
</script>
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
#Accepted{
	display:none;
}
</style>
<?php
$mysqli=mysqli_connect("localhost","root","","cms");
?>

  <title>Pharmacist</title>

</head>
<body>

<div class="container-fluid">
    <div class="row">
		
        <div  class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
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
							<h5>Pharmacist</h5>
						</div>
                        <a class="nav-item nav-link active " onclick="" href="#">Home</a>
						
                       
						<br>
                        <a href="#" class="nav-item nav-link links" onclick="openTab(event,'Pending')">Pending</a>
						<br>
												
                        <a href="#" class="nav-item nav-link links" onclick="openTab(event,'Accepted')">Accepted</a>
						<br>
					
                        <button id="but" class="btn btn-outline-danger"> Logout</button>
                    </div>
                </div>
            </nav>
        </div>
		
        <div id="Pending" class="tabcontent col py-2 ">
						<br>
						<br>
						<h2>Dispensary Requests</h2>
						<br>
						<form method="post" >
						<table class="table">
						<thead>
							<th scope="col">#</th>
							<th scope="col">PatientID</th>
							<th scope="col">Disease</th>
							<th scope="col">Prescription</th>
							<th scope="col"></th>
						</thead>
						<tbody>
							
							<?php
							$sql="SELECT * FROM doctors_deduction WHERE accepted='0'";
							$result=mysqli_query($mysqli,$sql);
				
							while($row=mysqli_fetch_array($result)){
								$id=$row[0];
								$patie_id=$row[2];
								$dise=$row[3];
								$prescr=$row[4];
								
								echo "<tr>";
								echo "<td class=\"id\">".$id."</td>";
								echo "<td class=\"patied\">".$patie_id."</td>";
								echo "<td class=\"disease\">".$dise."</td>";
								echo "<td class=\"prescription\">".$prescr."</td>";
								echo "<td >";
								echo "<button class=\"accept btn btn-outline-success my-2 my-sm-0\" name=\"accept\" type=\"submit\">Accept</button>";
								echo "</td>";
								echo "</tr>";
							}
							?>
			
						</tbody>
						
						
						</table>
						
						<input type="hidden" name="id" id="outPut" >
						</form>
					<?php
					
						if(isset($_POST['accept'])){
							$id=$_POST['id'];
							if ($id!=""){
							$sql="UPDATE doctors_deduction SET accepted='1' WHERE id='$id'";
							$result=mysqli_query($mysqli,$sql);
							}
							
							$id="";
							
						}
					?>
        </div>
		<div id="Accepted" class="tabcontent col py-2 ">
						<br>
						<br>
						<h2>Dispensary Requests</h2>
						<br>
						<table id="accepted"class="table">
						<thead>
							
							<th scope="col" >Doctor's Prescription</th>
							<th scope="col" >Disease</th>
							<th scope="col">Patient ID</th>

						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM doctors_deduction WHERE accepted='1'";
							$result=mysqli_query($mysqli,$sql);
				
							while($row=mysqli_fetch_array($result)){
								$id=$row[0];
								$patie_id=$row[2];
								$dise=$row[3];
								$prescr=$row[4];
								
								echo "<tr>";
								
								
								echo "<td class=\"prescription\">".$prescr."</td>";
								echo "<td class=\"disease\">".$dise."</td>";
								echo "<td class=\"patied\">".$patie_id."</td>";
								echo "</tr>";
							}
							?>						
		
						
						</tbody>
						</table>

        </div>
    </div>
</div>  
</body>
</html>
