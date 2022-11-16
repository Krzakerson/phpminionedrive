<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url("wallpaper.jpg");
        }

        img{
            width:300;
            height:200px;
        }
        .buttonfordelete{
            background-color:white;
            height: 200px;
            position: absolute;
            top:40%;
            left:40%;
        }


        .superdiv{
            visibility:hidden;
        }
       
    </style>
     <!-- Compiled and minified CSS -->
    
</head>
<body>
    
    <font color = "white">
    <h1>Here is gallery of the images</h1>
    <?php

include 'config.php';


$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $imageURLToDelete = $row["file_name"];
        
       
        echo "<div>";
        echo $row["file_name"];
        echo "<br>";
        //echo "Id of image " .$row["id"];
        echo "</div>";
       
        
?>
    
    <img src="
    <?php echo $imageURL; ?>
    " alt="" />
    
<?php }}
else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

<h1><a style = "color:white" href="imageadd.php">Go back</a></h1>

    
    <!-- Type id of image that u want to delete
<input type name = "chance" = "text"></input> -->


<!-- <input type = 'text' name = 'todelete' placeholder = 'Write name of image that u want to delete'> -->

    <?php

   
    //if(isset($_POST['todelete'])){
        //echo '<h1>PRZESLANO FORMULARZ</h1>';
    
    $querytotal = $db->query("SELECT file_name from images;");
    // $query2 = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");
   
    //$result = $querytotal->fetch_assoc();
    echo "<form method = 'post'>";
    while($row = $querytotal->fetch_assoc()){
         $pray = $row['file_name'];
        echo "<input type = 'checkbox' name = 'deletes[]' class = 'btn -btn-primary' value = $pray> CHECK TO DELETE  IMAGE OF Name ,, $pray ``</button>";
        echo "<br>";
        
    }
    echo "<button  class ='btn btn-primary' type = 'submit' name = 'submitdel'>DELETE</button>";
    
    if(isset($_POST['deletes'])){

   
    $deletes  = $_POST['deletes'];
    echo "<br>";
    var_dump($db);
    foreach($deletes as $value){
        echo $value;
        unlink('uploads/'.$value);
        //$queryfordel->fetch_all();
        //echo "DELETE FROM images WHERE file_name = '$value;'";
        mysqli_query($db,"DELETE FROM images WHERE file_name = '$value';");
        mysqli_close($db);
        //$queryfordel = ("DELETE FROM images WHERE file_name = '$value;'");
       // if($db->query($queryfordel) === TRUE){
           // echo "Usunieto plik o nazwie" . $value;
            //echo "<br>";
       // }
           
    }
   
  
}
    //$resulttotal = intval($result[0]);
   // echo $resulttotal . "<br>";
    
   

   
    ?>
</form>
</body>
</html>