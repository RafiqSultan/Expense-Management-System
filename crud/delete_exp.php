
<?php
include('../database/connect.php');

if(isset($_POST['delete_data'])){

 $exp_id=$_POST['delete_exp_id'];
 echo "HHHHHH  ";
 echo $exp_id;
  $query = " DELETE FROM expense WHERE id= '$exp_id' ";
  echo $query;
  $query_run = mysqli_query($connect, $query);

//   if($query_run)
//   {
//       header("Location:../php/show_expense.php");
//   }
//   else
//   {
//       echo '<script> alert("Data Not Deleted"); </script>';
//   }
}

?>