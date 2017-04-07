<!DOCTYPE html>

<html>
	<head>
	<title>QuickBucket</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="./css/style_home.css">
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<script src="./script/jquery-3.2.0.min.js"></script>
	<script src="./script/bootstrap.min.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Prociono" rel="stylesheet"> 
	</head>
	
	<body style="padding: 0px;" width="100vh">
	<div class="navigation" >
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
  		<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:  #ffcc5c;float: right;" >
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
	<div class="container" id="container">
	<script type="text/javascript"> var i=0; j=0;
	var colors=['#b3ffb3','#b3e6ff','#ffffb3','#eac8c8','#c2d6d6','#e1e1d0','#ffb3ff'];</script>
	
	<?php
	include_once 'gpConfig.php';
	
	include("connection.php");
	
	$uid=$_SESSION['id'];
	
	$sql= "select * from image_table where oauth_uid ='$uid' order by img_id desc";
	$result=mysqli_query($conn, $sql);
	$result=mysqli_query($conn, $sql);
	
	
	while($row=mysqli_fetch_array($result))
	{
	?>
	<script type="text/javascript">
		var node=null;
		function create(node){
			return document.createElement(node);
		}
		function createChild(parent,child)
		{
			 parent.appendChild(child);
		}
		var contentDiv=create("div");
		contentDiv.id="contents";
		contentDiv.className="col-xs-12 col-sm-6 col-md-3";
		var a1=create("a");
		a1.href="./description.php?img=<?php echo $row['img_id']?>";
		var image=create("img");
		image.src="uploads/<?php echo $row['img_name'] ?>";
		createChild(a1,image);
		createChild(contentDiv,a1);
		var a2=create("a");
		a2.href="./description.php?img=<?php echo $row['img_id']?>" ;
		a2.style="text-decoration: none;";
		var contentsDescDiv=create("div");
		contentsDescDiv.id="contents_description";
		contentsDescDiv.className="well";
		contentsDescDiv.style.backgroundColor=colors[j];
		j++;
		if(j>=colors.length)
			j=0;
		var h5Tag=create("h5");
		h5Tag.style.color="#0d0d0d";
		h5Tag.style.textTransform="uppercase";
		var span1=create("span");
		span1.className="description";
		createChild(span1,document.createTextNode("<?php echo $row['name']; ?>"));
		createChild(h5Tag,span1);
		var p1=create("p");
		p1.style="color: #404040;";
		createChild(p1,document.createTextNode("Useful for:"));
		var span2=create("span");
		span2.className="description";
		createChild(span2,document.createTextNode("<?php echo $row['used_for']; ?>"));
		createChild(p1,span2);
		var p2=create("p");
		p2.style="color: #404040;";
		createChild(p2,document.createTextNode("Price: Rs."));
		var span3=create("span");
		span3.className="description";
		createChild(span3,document.createTextNode(<?php echo $row['price']; ?>));
		createChild(p2,span3);
		createChild(contentsDescDiv,h5Tag);
		createChild(contentsDescDiv,p1);
		createChild(contentsDescDiv,p2);
		createChild(a2,contentsDescDiv);
		createChild(contentDiv,a2);
			if(i%4==0)
		{
			var row_div=create("div");
			row_div.className="row";
		}
		i++;
			createChild(row_div,contentDiv);
			createChild(document.getElementById("container"),row_div);
		</script>
	<?php
	}

	?>

</body>

</html>
