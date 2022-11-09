<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .divforform{
            width: 300px;
            text-align: center;
        }
        body{
            background-image: url("wallpaperandimages/plik.png");
        }
    </style>
</head>
<body>
    <center>
    <div class = "divforform">
<form method = "post">
    <font color = "white">

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input name = "log" type="text" id="login" class="form-control" />
    <label class="form-label" for="form2Example1">Login</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input name ="pass" type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Enter Password</label>
  </div>

  


  <!-- Submit button -->
  <button name = "subbutt" type="submit" class="btn btn-primary btn-block mb-4">Log in</button>

 
</form>
    </div>
    <?php
    
    $login = "Krzakerson";
    $password = "phpadmin";
    if(isset($_POST['log']) and isset($_POST['pass']))
    {
        $givenlog = $_POST['log'];
       
        $givenpass = $_POST['pass'];
        if($givenlog == $login and $givenpass == $password)
        {
            header("Location: choose.php");
        }
        else{
            echo "Blad podczas logowania";
        }
    }

    ?>
</body>
</html>