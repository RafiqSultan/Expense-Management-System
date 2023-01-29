
<?php
include('../database/connect.php');

if(isset($_POST['delete_data'])){

  $item_id = $_POST['deleteIncid'];
  $query = "DELETE FROM groups WHERE id=$item_id";
  $query_run = mysqli_query($connect, $query);

  if($query_run)
  {
    
      header("Location:all_group.php");
  }
  else
  {
      echo '<script> alert("Data Not Deleted"); </script>';
  }
}

?>