<?php
session_start();
$mysqli=mysqli_connect("localhost","root","","hms");

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

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

.user {
	
  display: inline-block;
  width: 90px;
  height: 90px;
  border-radius: 50%;
	
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}

.one {
  background-image: url('morocco.jpg');
}
#firstdiv{
	background-color:#F5F9F9;
	height:100vh;
	 position: sticky;
	
}
tbody{
	background-color:#EDFFFC;
	overflow-y: auto;
	
}
thead{
	background-color:#DAF7A6;
	
}
</style>
</head>
<body>
<div class="row">
        <div  class="col-md-2" id="firstdiv">
            <nav class="navbar navbar-light navbar-expand-sm px-3 flex-row flex-nowrap">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
				
                 <div class="navbar-collapse collapse" id="navbarWEX">
                    <div class="nav flex-sm-column flex-row">
					<br>
				
						<div class="mid ">
							<div id="mid" class="user one">
							</div>
							<br>
							
						</div>
						<br>
						
                        <a class="nav-item nav-link active px-3" href="#"><b>Home</b></a>
						
                       <a href="#" class="nav-item nav-link active px-3 text-danger">Logout</a>
						<br>
					
                        
                    </div>
                </div>
            </nav>
        </div>
		
<div class="col py-2" id="secdiv">
<br><br>
<h4 class="px-4">Vital List</h4>
<br><br>


<div class="table-responsive col-md-10 px-4">
<input type="text" id="myInput" onkeyup="myFunction()"  class="form-control  col-md-3 py-2" placeholder="Search for patient id's.." title="Type in a name">
<br>
<table id="myTable" class="table table-hover ">
	<thead>
    <th >Patient ID</th>
    <th>BP</th>
	<th>Pulse</th>
	<th>Temperature</th>
	<th>Height</th>
	<th>Weight</th>
  </thead>
  <tbody>
  <?php

				$sql="SELECT * FROM pat_rep ORDER BY entry_date DESC";
				$result=mysqli_query($mysqli,$sql);
		
				while($row=mysqli_fetch_array($result)){
					
					$pat_id=$row[0];
					$bp=$row[1];
					$pulse=$row[2];
					$temp=$row[3];
					$height=$row[4];
					$weight=$row[5];
					echo "<tr onclick=\"orderModal();\">";
						echo "<td>".$pat_id."</td>";
						echo "<td>".$bp."</td>";
						echo "<td>".$pulse."</td>";
						echo "<td>".$temp."</td>";
						echo "<td>".$height."</td>";
						echo "<td>".$weight."</td>";
					echo "</tr>";
					
				}
	
  
  ?>
  <div class="modal fade " id="SreportsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog  modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="myLargeModalLabel">Doctors Deduction</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</div>
						<div class="modal-body">
						<form method="post">
						<input type="text" readonly class="col-md-4 form-control" name="docid" placeholder="Doctor ID" value = " <?php echo $_SESSION['user_id'] ?>">
						<br>
						<br>
						<input type="text" id="patinp" class="col-md-4 form-control" name="patid" placeholder="Patient ID" readonly>
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
  <input type="hidden" id="outee">
</tbody>
</table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];
tbody.onclick = function (e) {
    e = e || window.event;
    var data = [];

    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) {
        var cells = target.getElementsByTagName("td");
	
        for (var i = 0; i < cells.length; i++) {
			
            data.push(cells[i].innerHTML);
        }
    }
    //alert(data);
	var inp=document.getElementById('outee');
	inp.value=data;
	
	var inpu=document.getElementById('patinp');
	inpu.value=data[0];
};
function orderModal(){
    $('#SreportsModal').modal({
        keyboard: true,
        backdrop: "static"
    });
};
</script>
</div>
</div>
</body>
</html>
