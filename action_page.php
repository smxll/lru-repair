<html>
<head>
<title>action page</title>
  	<title>processing</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
		.jumbotron {margin-top: 85px; width: 40%;height: 30%; text-align: center;font-size: 18px;align-content: center;}

  	</style>
</head>
<body>
<?php

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "rp_table";


	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "INSERT INTO rp_user(name, dept_name, tel)
		VALUES ('".$_POST["name"]."','".$_POST["dep"]."','".$_POST["tel"]."')";

	$sql2 = "INSERT INTO rp_repair(customer_name,job_id, room, building, lands_detail, job_detail)
		VALUES ('".$_POST["name"]."','".$_POST["job_name"]."','".$_POST["room"]."','".$_POST["building"]."','".$_POST["lands_detail"]."','".$_POST["job_detail"]."')";

	$sql3 = "INSERT INTO rp_repair_status(name,tel, job_id, room, building, lands_detail, job_detail)
		VALUES ('".$_POST["name"]."','".$_POST["tel"]."','".$_POST["job_name"]."','".$_POST["room"]."','".$_POST["building"]."','".$_POST["lands_detail"]."','".$_POST["job_detail"]."')";

	$query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$query2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
	$query3 = mysqli_query($conn, $sql3) or die (mysqli_error($conn));
?>


<div class="container h-100" align="center">
    <div class="row align-items-center h-100">
        <div class="col-6 mx-auto">
            <div class="jumbotron">
              <h1><span class="glyphicon glyphicon-ok"></span></h1>
              ส่งแบบฟอร์มแล้ว 
              <a href="./index.php">กลับหน้าหลัก</a>
            </div>
        </div>
    </div>
</div>


</body>
</html>
