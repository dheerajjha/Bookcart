<html>
<head>
</head>
<body>
<?php

include("config.php");

$name=$_POST['nick'];
$pass=$_POST['password'];
$uid=$_POST['email'];
$ph=$_POST['phone'];
echo"$uid--$name--$pass--$ph"; 
$fake=0;
$done=0;
session_start();
echo "u are on registertemp.php";echo "\n";

	         if(mysqli_connect_error())
	         {
		       echo "Error in connecting to database: ".mysqli_connect_error();
	         }
	         else {
				 $sql="SELECT * from user";
				 
					 $result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				 while($row=mysqli_fetch_assoc($result)){
					 if($row['uid']==$uid)
						 $fake=1;
				
				
				 
				 }
			}
					 if($fake!=1){
                 $sql1="INSERT INTO `user`(`uid`,`name`,`pass`,`ph`) VALUES ('$uid','$name','$pass','$ph')";

                 if(mysqli_query($conn,$sql1))
				 {$done=1;
				 }else{echo"query failed";}
                     
//file upload
                $target_dir = "uid_files/";
                $extension = strrchr(basename($_FILES["fileToUpload"]["name"]),".");
$target_file = $target_dir . $uid . $extension;//basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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

if($done==1 && $uploadOk==1)
{header('Location:login.php');
}                }
				 else{
					 echo"You are already registered";
					 
				 }

			 }


?>
</body>
</html>
