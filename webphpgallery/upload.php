<?php
// Include the database configuration file
include 'config.php';
$statusMsg = '';
$backlink = ' <a href="indextoupload.php">Go back</a>';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                if($insert){
                    $statusMsg = "The file <b>".$fileName. "</b> has been uploaded successfully. You will be autoredirected after: 3s";
                    for($i =0 ; $i < 3;$i++){
                        sleep(1);
                        if($i = 3){
                            header("refresh:3;url=indextoupload.php" );
                        }
                    }                    
                   
                }else{
                    $statusMsg = "File upload failed, please try again." . $backlink;
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload." . $backlink;
        }
    }else{
            $statusMsg = "The file <b>".$fileName. "</b> is already exist." . $backlink;
        }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}

// Display status message
echo $statusMsg;
?>