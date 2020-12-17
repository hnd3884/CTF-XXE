<?php

if(isset($_POST["submit"])){
    $target_dir = "Upload/";
    $target_file = $target_dir . basename("xmlUploaded.xml");
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    header("Location: home.php");
}