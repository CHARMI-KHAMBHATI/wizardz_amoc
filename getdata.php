<?php


include("connection.php");
include_once 'gpConfig.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$name=$_FILES["pic"]["name"];
$type=$_POST["type"];
$nm=$_POST["name"];
$price=$_POST["price"];
$use=$_POST["use"];
$descp=$_POST["description"];
$uid=$_SESSION['id'];
echo $name.$target_file.$uid.$descp.$type.$nm.$price.$use;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["pic"]["size"] > 8000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) 
    {
        
        $sql="INSERT INTO image_table(img_name,path,oauth_uid,description,price,type,name,used_for) VALUES('$name','$target_file','$uid','$descp','$price','$type','$nm','$use')";
        $result=mysqli_query($conn, $sql);
        if($result)
        {
            echo "image uploaded";
            header("location:imageView.php");
        
        }
        else echo "error".mysqli_error($conn);
    
        
    }  
    
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>
