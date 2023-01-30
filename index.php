<?php
require "db.php";

$req="SELECT * FROM cllient ";
$result =$pdo->prepare($req);
$result->execute();
$people = $result->fetchAll(PDO::FETCH_OBJ);
?>

<?php   
require "header.php";
?>
<div class="contaner">
    <div class="card mt-5">
        <div class="card-header">
            <h2>All people</h2>

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

        <?php foreach($people as $p):?>
                <tr>
                    <td><?=$p->id?></td>
                    <td><?=$p->name?></td>
                    <td><?=$p->email?></td>
                    <td>
                        <a href="edit.php?id=<?=$p->id?>" class="btn btn-info">Edit</a>
                        <a onclick="return confirm('are you sure want to delete this entry?') "href="delete.php?id=<?=$p->id?>" class="btn btn-danger">Delet</a>
                    </td>
                </tr>
        <?php endforeach ?>
            </table>
        </div>
    </div>
</div>


    
   <?php  
   require 'footer.php' ;
   ?>