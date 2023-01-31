<?php
   /*
    --------------------------------------------
       * Delete user from database
    ---------------------------------------------
    */
        include('../database/connect.php');
         $u_id = $_POST['deleteuser_id'];
         
        $querry="DELETE FROM users WHERE id=$u_id";
        
        if($r=mysqli_query($connect,$querry)) {
           
            header('location:all_user.php');
        } 
        else {
            echo '<script> alert("'.mysqli_error($connect).'"); </script>';
       
        }
         
    
       
       ?>