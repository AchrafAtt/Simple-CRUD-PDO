<?php   
require "db.php";
$id = $_GET['id'];

//requet sql
$req = "DELETE FROM cllient WHERE id=:id";
$resl = $pdo->prepare($req);
if($resl->execute(array(":id" => $id)))
    
     {   
        //heder to index page
         header('Location:index.php');
         
     }








?>