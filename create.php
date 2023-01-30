<?php   
require "header.php";
require "db.php";
$message= "";
if(isset($_POST['name']) && isset($_POST['email'])){
    $name= $_POST['name'];
    $email=$_POST['email'];
//insert in data base
    //requet sql
    $req = "INSERT INTO cllient (name,email) VALUES (:name,:email) ";
    $resl = $pdo->prepare($req);

    //if tous passe bein message = data insert
    //execute requet 
    if(
    $resl->execute(array(
        ":name"=>$name,
        ":email"=>$email
    )))
    {   
        //message chnge
        $message = "data insert";
        
    }

}


?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a person</h2>
        </div>
        <div class="card-body">
            
            <?php if(!empty($message)):    ?>
            <div class="alert alert-success">
                <?php   echo $message; ?>
            </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" >Create a personn</button>
                </div>
            </form>
        </div>
    </div>
</div>


    
   <?php  
   require 'footer.php' ;
   ?>