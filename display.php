<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Display</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/display.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>


	<style>
		.col a {
			text-decoration: None;
			color: black;
		}
	</style>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT p.subject as subject ,p.proposal_number as proposal_number,p.revision_number as revision_number,u.username  as username FROM proposal p ,users u where p.user_id=u.id";
$result = $conn->query($sql);

echo mysqli_error($conn);


?>

<body>



	<div class="row">
		<?php
		if ($result->num_rows > 0) {
	 // output data of each row
	   while($row = $result->fetch_assoc()) {
	  ?>
	 
		<div class="col-sm-6">
			
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Proposal NO
							<?php echo $row["proposal_number"]; ?>
						</h5>
						<p class="card-text">
						    <p>Revision NO
							  <?php echo $row["revision_number"]; ?>
						    </p>
						    <p> Subject:
							  <?php echo $row["subject"]; ?>
					    	</p>
						    <p>Last Updated By:
							  <?php echo $row["username"]; ?>
						   </p>
						</p>
						<a  class="col-sm-6 my-2"  href="view_proposal.php?id=<?php echo $row["proposal_number"];?>" style="text-decoration:none;">
						      <img src="img/edit.png" alt="" style="width: 27px;">
						</a>
					</div>
				</div>
		 </div>
		
		<?php 

  }
} else {
 echo "0 results";
}
$conn->close();
?>

	</div>
</body>

</html>