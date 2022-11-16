console.log("js podpiety");


function DeletFile()
{
    var fs = require('fs');
    var filePath = 'C:/xampp\htdocs\Michał_Żak_3tip/testtousu/delete.txt'; 
    fs.unlinkSync(filePath);
}