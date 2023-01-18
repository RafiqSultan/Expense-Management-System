
<?php
include('../database/connect.php');

if(isset($_POST['delete_data'])){

  $id = $_POST['delete_inc_id'];

  $query = "DELETE FROM income WHERE id='$id'";
  $query_run = mysqli_query($connect, $query);

  if($query_run)
  {
      header("Location:../php/show_income.php");
  }
  else
  {
      echo '<script> alert("Data Not Deleted"); </script>';
  }
}

?>