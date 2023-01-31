
<?php
   /*
    --------------------------------------------
       * Delete expense item from database 
    ---------------------------------------------
    */
include('../database/connect.php');

if(isset($_POST['delete_data'])){

  $item_id = $_POST['deleteExpid'];
  $query = "DELETE FROM expense WHERE id=$item_id";

  $query_run = mysqli_query($connect, $query);

  if($query_run)
  {
      header("Location:../php/show_expense.php");
  }
  else
  {
      echo '<script> alert("Data Not Deleted"); </script>';
  }
}

?>