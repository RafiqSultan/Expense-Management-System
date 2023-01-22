<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
</head>
<body>
<?php
include('../database/connect.php');
if(isset($_POST['delete_data'])){

  $item_id = $_POST['deleteIncid'];
  
  $query = "DELETE FROM income WHERE id=$item_id";

  

  if($query_run = mysqli_query($connect, $query))
  {
    header("location:../php/show_income.php");
  }
  else
  {
      echo '<script> alert("Data Not Deleted"); </script>';
  }
}

?>
 <script type="text/javascript">
        setTimeout(function () {

            $('#alert_notf').alert('close');
        }, 3000);
    </script>

      </body>
      </html>