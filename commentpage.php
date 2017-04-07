<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'setcomment.inc.php';
 include_once 'gpConfig.php';
include("connection.php");


?>

<!DOCTYPE html>
<html>
<head>
	<title>QuickBucket</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="./css/style_home.css">
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<script src="./script/jquery-3.2.0.min.js"></script>
	<script src="./script/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Prociono" rel="stylesheet"> 
</head>
<body>
<div class="navigation"  >
	<div class="container">
	<div class="row">
	<ul>
	<li class="col-xs-3 col-md-2 "><a href="./imageView.php">Home</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs"><a href="Upload_file.html">Upload</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs"><a href="myUploads.php">MyUploads</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs"><a href="commentpage.php">Discuss</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs" id="logout"><a href="./logout.php">Logout</a></li>
	 <div class="dropdown visible-xs" style="display: block;
	color: #ffffff;
	font-size:1.35em;
	margin-top:1.25em;
	padding-top: 17.5px;
	margin-bottom: 1.25em;position: relative;">
  		<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffcc5c;float: right;" >
          <span class="glyphicon glyphicon-menu-hamburger col-xs-3"></span>
         </button>
      
  <ul class="dropdown-menu" style="position: absolute;top: 100%; 
  right: 0;
  margin-left: -5px;
  margin-top: 33px;" >
    <li><a  style="color: #ffd600;" href="Upload_file.html">Upload</a></li>
    <li><a  style="color: #ffd600;" href="myUploads.php">MyUploads</a></li>

	<li ><a  style="color: #ffd600;" href="commentpage.php">Discuss</a></li>
    <li><a   style="color: #ffd600;" href="./logout.php">Logout</a></li>
  </ul>

</div> 
	</ul>
	</div>	
	</div>
	</div>
<br>
<br>

<?php
	if(isset($_SESSION['id'])){
			echo "<form method='POST' action='".setComment($conn)."'>
		<input type='hidden' name='uid' value='".$_SESSION['id']."'>
		<input type='hidden' name='cdate' value='".date('Y-m-d H:i:s')."'><br>
		<div class='container'>
    		<div class='row'>
	    	<div class='col-md-6 col-xs-12'>
    						<div class='widget-area no-padding blank'>
								<div class='status-upload'>
									<form>
										<textarea cols='35' name='message' ></textarea>
										<button type='submit' name='commentSubmit' class='btn ' style='background-color: #009999; color:white;' >
										Ask</button>
										<br>
									</form>
								</div>
							</div>
			</div>
        
    	</div>
		</div>
		</form>";
	}else{
		echo "You need to be logged in to join discussion!!<br><br>";
	}	getComment($conn);
	
?>
</body>
</html>

