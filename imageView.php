
<!DOCTYPE html>

<html>
	<head>
		
		<title>
		My upload
		</title>
	</head>
	
	<body>
	
	Logout from <a href="logout.php">Google</a>
	<br>
	  <a href="Upload_file.html">upload</a>
	
	<br>
	
	
	<?php
	include_once 'gpConfig.php';
	
	include("connection.php");
	
	echo $_SESSION['email']." its from me ".$_SESSION['id']."\n";
	
	$sql= "select * from image_table,users order by img_id desc";
	$result=mysqli_query($conn, $sql);
	$result=mysqli_query($conn, $sql);
	echo "\n";
	while($row=mysqli_fetch_array($result))
	{
	?>
	<?php echo '<script> var object={"image": "uploads/" + $row['img_name'],
	"first_name": $row['first_name'],
	"last_name": $row['last_name'],
	"name": $row['name'],
	"type": $row['type'],
	"used_for": $row['used_for'],
	"price":$row['price'],
	"description":$row['description']}
	content.push(object);
	(function(object){
		var pdiv=document.createElement("div");
		pdiv.class=content.indexOf(object);
		document.body.appendChild(pdiv);
		var imgTag=document.createElement("img");
		imgTag.src=object.image;
		imgTag.className="i"+content.indexOf(object);
		document.getElementByClass(content.indexOf(object)).appendChild(imgTag);		
		var ufor=document.createTextNode(object.used_for);
		ufor.className="u"+content.indexOf(object);
		document.getElementByClass(content.indexOf(object)).appendChild(ufor);
		var name=document.createTextNode(object.name);
		name.className="n"+content.indexOf(object);
		document.getElementByClass(content.indexOf(object)).appendChild(name);
		var price=document.createTextNode(object.price);
		price.className="p"+content.indexOf(object);
		document.getElementByClass(content.indexOf(object)).appendChild(price);

		})(object);  </script>';?>
	<?php
	}

	?>

</body>

</html>
<!--<table style="width:100%">
		
		<tr><td><img src="uploads/<?php echo $row['img_name']?>" width="20%" height="auto"></td></tr>
		 <tr><td><?php echo $row['first_name']." ".$row['last_name'];?> </td></tr>
		 <tr><td><?php 		  echo $row['name'];?> </td></tr>
		 <tr><td><?php 		  echo $row['type'];?></td></tr>
		 <tr><td><?php 		echo $row['used_for'];?> </td></tr>
		 <tr><td><?php 	  echo $row['price'];?> </td></tr>
		 <tr><td><?php 	  echo $row['description'];?> </td></tr>
		 
	</table>
	<?php
session_start();
// ... php code ...
echo '<script type="text/javascript">alert("Welcome '. $_SESSION['nume']. '");</script>';
?> 
	-->
