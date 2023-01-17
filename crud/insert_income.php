<?php
        include("../database/connect.php");
        session_start();
        $name_inc=$_POST['name_inc'] ;
        $describe=$_POST['describe'] ;
        $amount=$_POST['amount'] ;
        $date_inc=$_POST['date_inc'] ;
        $userid=$_SESSION['user_id'];
       
        $query= "INSERT INTO  income (name, descrption, date, amount, user_id)
        VALUES
        ('$name_inc' , '$describe' , '$date_inc' , $amount ,$userid)";
        if($result=mysqli_query($connect,$query))
        {
                   
                    $class="alert alert-success";
                    $role="alert";
                    echo "<div class='$class' role='$role'>
                   ADD Successful
                  </div>";
                   header("location:../php/show_income.php");
        }
        else{
            echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
        }
           
 
        
    
    
     ?>