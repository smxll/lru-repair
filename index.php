<!DOCTYPE html>
<html lang="en">
<head>
  	<title>LRU Repair System</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style type="text/css">
			.jumbotron {margin-top: 80px;background-color: #ffffff;}
		    .bg-light {background-color: #f8f9fa!important;}
		    .btn-outline-success{margin-top: 8px;}
  		</style>
</head>
<body>

	<nav class="navbar navbar-fixed-top navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="./index.php">LRU Repair System</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">]

	      </ul>
	     
	      <ul class="nav  navbar-right ">
	    	<form class="form-inline">
			   <button class="btn btn-outline-success" type="button" ><a href="#fixd"><span class="glyphicon glyphicon-search"></span> ติดตามสถานะ</a></button>
			   <button class="btn btn-outline-success" type="button" ><a href="#form"><span class="glyphicon glyphicon-wrench"></span> แจ้งซ่อม</a></button>
			</form>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav> 

	<div class="bg-light">
	<div class="container">
	<div id="fixd">
	<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
	<div class="jumbotron">
		<label><h2><span class="glyphicon glyphicon-search"></span> ติดตามสถานะ</h2></label>
                <div class="row">
          <div class="col-lg-12">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                <input name="txtKeyword" type="text" class="form-control" placeholder="ค้นหาจากชื่อ - นามสกุล หรือหมายเลขโทรศัพท์" id="txtKeyword" value="">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
          <div class="clearfix"></div> 
    </div>
    </div>
    </form>
	<?php
	error_reporting(~E_NOTICE);
	if($_GET["txtKeyword"] != "")
		{
		$db = mysqli_connect("localhost", "root", "", "rp_table");
		$res = mysqli_query($db, "SELECT * FROM rp_repair_status WHERE (name LIKE '%".$_GET["txtKeyword"]."%' or tel LIKE '%".$_GET["txtKeyword"]."%')");
		?>
		<table class="table">
		  <tr>
			<th>ลำดับ</th>
			<th>ชื่อ - นามสกุล</th>
			<th>เบอร์โทร</th>
			<th>รหัสประเภทงาน</th>
			<th>หมายเลขห้อง</th>
			<th>อาคาร</th>
			<th>บริเวรสถานที่</th>
			<th>ลักษณะชำรุด</th>
			<th>วันที่ส่งแบบฟอร์ม</th>
			<th>สถานะ</th>
		  </tr>
		<?php
		while($objResult = mysqli_fetch_array($res))
		{
		?>
		  <tr>
			<td><?php echo $objResult["id"];?></td>
			<td><?php echo $objResult["name"];?></td>
			<td><?php echo $objResult["tel"];?></td>
			<td><?php echo $objResult["job_id"];?></td>
			<td><?php echo $objResult["room"];?></td>
			<td><?php echo $objResult["building"];?></td>
			<td><?php echo $objResult["lands_detail"];?></td>
			<td><?php echo $objResult["job_detail"];?></td>
			<td><?php echo $objResult["create_date"];?></td>
			<td><?php echo $objResult["status"];?></td>
		  </tr>
		<?php
		}
		?>
		</table>
		<?php
		mysqli_close($db);
	}
	?>

	<div id="form">
    <br><br>
    <h1 align="center"><span class="glyphicon glyphicon-list-alt"></span></h1>
	<h3 align="center"></span>แบบฟอร์มแจ้งซ่อมงานอาคารสถานที่</h3>
	<h4 align="center"></span>มหาวิทยาลัยราชภัฎเลย</h4><br>
  	<form action="./action_page.php" method="post" >

  	<table class="table">
    <tr>
      <td colspan="2" >
        <div class="form-group" >
          <label for="name">ชื่อ - นามสกุล</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="form-group">
          <label for="dep">หน่วยงาน</label>
          <input type="text" class="form-control" id="dep" name="dep">
        </div>
      </td>
      <td>
        <div class="form-group">
          <label for="tel">หมายเลขโทรศัพท์ที่ติดต่อได้</label>
          <input type="text" class="form-control" id="tel" name="tel">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div class="form-group">
         <label for="job_name">ประเภทงานซ่อม</label>
			<form>
		    <select name="job_name" id="job_name" class="form-control">
			<?php
			$db = mysqli_connect("localhost", "root", "", "rp_table");
			$res = mysqli_query($db, "SELECT * FROM rp_inventory");
			while($row = mysqli_fetch_array($res)) {
			    echo("<option value='".$row['id']."'>".$row['job_id']."-".$row['job_name']."</option>");
			}
			?>
			<option selected></option>
			</form>
    	</div>
      </td>
    </tr>
    <tr>
    	<td>
	        <div class="form-group">
		        <label for="room">หมายเลขห้อง</label>
		        <input type="text" class="form-control" id="room" name="room">
	        </div>
     	</td>
     	<td>
     		<div class="form-group">
		        <label for="lands_detail">บริเวรสถานที่</label>
		        <input type="text" class="form-control" id="lands_detail" name="lands_detail">
	        </div>
     	</td>
    </tr>
    <tr>
    	<td>
    		<label for="bulding">อาคาร</label>
		    <input type="text" class="form-control" id="building" name="building">
    	</td>
    	<td>
    		<label for="job_detail">ลักษณะชำรุด</label>
		    <textarea class="form-control" id="job_detail" name="job_detail" placeholder="บรรยายการลักษณะชำรุด"></textarea>
    	</td>
    </tr>
    <tr>
      <td align="center">
      	<br>
        <button type="submit" class="btn btn-success" value="submit" style="width:100%">ตกลง</button>
      </td>
      <td align="center">
      	<br>
      	<button type="reset" class="btn btn-warning" value="cancel" style="width:100%" >รีเซ็ท</button>
      </td>
    </tr>
    </table>
	</div>
    <br>
    </form>
    </div>
</body>
</html>

