<?php
if(isset($_FILES['photo'])){
    $conn = mysqli_connect("localhost", "root", "1234", "nixdb");
    if(mysqli_connect_errno()){
        echo "Please check your database connection!";
        exit;
    }
 
    if(!file_exists("upload")){
        mkdir("upload", 0777);
    }
 
    $filename = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$filename);
 
    $sql = "INSERT INTO photo(path) VALUES('$filename')";
    $query = mysqli_query($conn,$sql);
 
    if($query){
        echo "Upload photo success";
    }else{
        echo "Upload photo failed. " + $stmt->errno;
    }
}else{
    echo "No File!";
}
?>