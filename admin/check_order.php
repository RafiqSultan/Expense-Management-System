<?php
   /*
    --------------------------------------------
       *  Update order state if accept or reject
    ---------------------------------------------
    */
include('../database/connect.php');
$id=$_GET['id'];
$user=$_GET['user'];
$state=$_GET['state'];

$query="UPDATE orders  SET order_state=$state WHERE id=$id and user_id=$user";
            if($qq=mysqli_query($connect,$query)){
                
                    header("location:all_order.php");    
            
        }
      
        else{
            echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
        }

?>