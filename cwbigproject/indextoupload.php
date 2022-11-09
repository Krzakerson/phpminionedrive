<!DOCTYPE html>
<html>
<head>
  <title>Upload Image</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body{
      background-image:url("wallpaperandimages/wallpaperbetter.jpg")
    }
    .divforbrowse{
      width:300px;
    }
    </style>
</head>
<body>
  <div class = "divforbrowse">
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <font color = "white">
        Select Image File to Upload:
        <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name = "file">
    <label class="custom-file-label" for="customFile" >Choose file</label>
  </div>
      <input class = "btn btn-primary" type="submit" name="submit" value="Upload">
  </form>
  </div>
  </body>
</html>