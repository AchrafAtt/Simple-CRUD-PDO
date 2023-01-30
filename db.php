<?php

$dsn = "mysql:host=localhost;dbname=crud";
$user="root";
$pass="";

try{
//test connextion
$pdo = new PDO($dsn,$user,$pass);
//setattribute
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $e){
echo "Faild" . $e->getMessage();

}



?>