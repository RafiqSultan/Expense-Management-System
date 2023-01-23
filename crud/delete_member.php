
<?php
include('../database/connect.php');

if(isset($_POST['delete_data'])){

  $member_id = $_POST['deleteMid'];
  $memberG_id = $_POST['deleteMGid'];
  $query = "DELETE FROM user_group WHERE user_id=$member_id and group_id=$memberG_id";

  $query_run = mysqli_query($connect, $query);

  if($query_run)
  {
      header("Location:../php/show_all_member.php");
  }
  else
  {
      echo '<script> alert("Data Not Deleted"); </script>';
  }
}

?>