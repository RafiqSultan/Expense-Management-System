<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        <!-- 
        // $type="button";
        // $class="btn btn-primary";
        // echo "<a href='../crud/delete.php?id=$row[0]' type='$type' class='$class'>Save changes</a>" -->
      </div>
    </div>
  </div>
</div>

<?php
include('../database/connect.php');
$id=$_GET['id'];
         if($id)
         {
           
            $query=mysqli_query($connect,"DELETE FROM `category` WHERE category_number='$a'");
             if(!$qq)
                 echo "<h2>".'errr'."</h2>";
             else
             {
                 
                 header("location:deletecatogry.php?id=");
                 exit;
                 
             }
         }

?>