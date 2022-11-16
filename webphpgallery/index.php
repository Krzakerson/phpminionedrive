<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body><center>
    <font color = "white">
    <div class="formplace">
        
    <form method = "post">
        <div class="form-group">
            <label for="getdir">Please enter dir that u want to get info off</label>
            <input type="text" class="form-control" id="dirid" placeholder="Enter dir" name = "dirname">
        </div>
        <button  class = "btn btn-primary"type = "submit">Wyslij</button>
        </center>
    </form>
    </div>
    <?php
   
    //var_dump($dane);
    //var_dump(count($dane));
    class File{
        private string $filename;
        private string $filetype;

        public function GetDir(){
            if(isset($_POST['dirname']))
            {
                $dirchosen = $_POST['dirname'];
                if(is_dir("C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen")==true)
                {
                    echo "<center>";
                echo "<h4> Your chosen dir : $dirchosen</h4>";
                $danenow = scandir("C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen");
                foreach($danenow as $value)
                {
                    if($value != ".." and $value != ".")
                    {  
                        $html = "<table class = 'table'><tr><td>Name</td><td>Type</td><td>Is_Dir</td><td>Created_Date<td><td><h4><a href='?delete=1'>Delete_Now!</a></h4><td></tr>";
                        $html .= "<td>$value</td>";
                        $html .= "<td>". filetype("C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen/$value"). "</td>";
                       
                        if(is_dir("C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen/$value") == true)
                        {
                            $html .= "<td>true</td>";
                        }
                       
                        else{
                            $html .= "<td>false</td>";
                        }
                        $html .= "<td>". date("D d Y H:i:s",filemtime("C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen/$value"))."</td>";
                        $html .= "</tr></table>";
                 
                        echo $html;
                         if(isset($_GET['delete']))
                        {
                            //echo "C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen/$value";
                            echo "Plik został usuniety";
                            //Unlink dziala ale od razu usunie wszystkie pliki po wybraniu folderu
                            //Sprawdzic https://www.youtube.com/watch?v=WscLGtEXW6M`
                            echo "C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen/$value";
                            unlink("C:/xampp\htdocs\Michał_Żak_3tip/$dirchosen/$value");
                            echo "<a href='javascript:history.go(-1)'>link text here...</a>";
                        }
                    }
                    
                  
                }
               
                echo "</center>";
                }
                else{
                    echo "<h4>Directory_doesnt_exist!</h4>";
                }
                
            }   
        }

        public function ShowDirs():array{
            return scandir("C:/xampp\htdocs\Michał_Żak_3tip");
        }  
    }
    $file1= new File;
    $arrayofdirs = $file1->ShowDirs();
    echo "<div class = 'dirplace'>";
    echo "<h4>List of dirs in your main dir</h4>";
    foreach($arrayofdirs as $value)
    {
        if($value != ".." and $value != ".")
        {
            echo "<div>";
            echo $value."<br>";
        }
    
    }
    echo "</div>";
    echo "<div class = 'tableandh4place'>";
    $file1->GetDir();
    echo "</div>";
    ?>
</body>
</html>