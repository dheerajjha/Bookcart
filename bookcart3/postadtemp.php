<html>
<head>
</head>
<body>
<?php

include("config.php");
session_start();
$adtitle=$_POST['adtitle'];
$uid=$_SESSION['login_user'];
$price=$_POST['price'];
$description=$_POST['description'];
if($_POST['category']=='Workshop') $category='Workshop Tools';
else
if($_POST['category']=='Engineering') $category='Engineering Drawing Tools';
else
$category = $_POST['category'];

echo "here is the caught category "; echo $category;echo "<br><br>";
echo "u are on postadtemp.php";echo "select  "; echo $adtitle; 
echo "select  "; echo $uid;
echo "select college= "; 
echo "done select  "; echo $price;
echo "select her is des "; echo $description;
echo "select  ";

	         if(mysqli_connect_error())
	         {
		       echo "Error in connecting to database: ".mysqli_connect_error();
	         }
	         else {
                
			
                $sql="SELECT ad_count from ad_count";
                $result=mysqli_query($conn,$sql);
     while($row = mysqli_fetch_assoc($result)) {
        $ad_count=$row["ad_count"];
                    }
echo "<br>".$ad_count;
$ad_name=$ad_count;
 $sql="UPDATE ad_count SET ad_count=ad_count+1";
                $result=mysqli_query($conn,$sql);
					 
                 $sql="INSERT INTO `adsentry`(`adtitle`,`uid`,`price`,`description`,`category`,`ad_no`) VALUES ('$adtitle','$uid','$price','$description','$category','$ad_count')";

                 if(mysqli_query($conn,$sql))
                    echo "success";



                //file upload
                $target_dir = "ad_images/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                $extension = strrchr(basename($_FILES["fileToUpload"]["name"]),".");
$target_file = $target_dir . $ad_name . $extension;//basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


        

                 }




?>
</body>
</html>
