<?php   
require "header.php";
require "db.php";

$id = $_GET['id'];

$sql ='SELECT * FROM cllient WHERE  id =:id';
$result = $pdo->prepare($sql);
$result->execute(array(
    "id"=>$id
));
$person=$result->fetch(PDO::FETCH_OBJ);

if(isset($_POST['name']) && isset($_POST['email'])){
    $name= $_POST['name'];
    $email=$_POST['email'];
//insert in data base
    //requet sql
    $req = "UPDATE cllient SET name=:name, email=:email WHERE id=:id ";
    $resl = $pdo->prepare($req);

    //if tous passe bein message = data insert
    //execute requet 
    if(
    $resl->execute(array(
        ":name"=>$name,
        ":email"=>$email,
        ":id"=>$id
    )))
    {   
        //message chnge
        header('Location:index.php');
        
    }

}


?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update a person</h2>
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
                    <input value="<?=$person->name; ?>" type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= $person->email; ?>"  type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


    
   <?php  
   require 'footer.php' ;
   ?>