<?php

// class Database{
//     private $host;
//     private $dbUsername;
//     private$dbPassword;
//     private $dbName;
//      function  __construct(){
//         $dbName  = "localhost";
//         $dbUsername = "root";
//         $dbPassword = "";
//         $dbName = "bazadanychobrazki";
//     }
//      function ConnecttoDSatabase(){
//         $db = mysqli_connect($host , $dbUsername , $dbPassword , $dbName);
//         if($db->connect_error){
//             die("Connection failed : ");
//         }
//      }
// }


// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "bazadanychobrazki";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>