<?php
    
        include("../database/connect.php");
        session_start();
        $item=$_POST['item'] ;
        $amount=$_POST['amount'] ;
        $start_date=$_POST['start_date'] ;
        $end_date=$_POST['end_date'] ;
        $userid=$_SESSION['user_id'];

        if(empty($start_date)){
            date_default_timezone_set('Asia/Riyadh');
            $start_date = date('Y-m-d');
         }
         if(empty($end_date)){
            date_default_timezone_set('Asia/Riyadh');
            $end_date = date('Y-m-d');
         }
        $query= "INSERT INTO  expense (item, amount, start_date,end_date, user_id)
        VALUES
        ('$item' , '$amount' , '$start_date' ,'$end_date',$userid)";
        echo $query;
        if($result=mysqli_query($connect,$query))
        {
                   
                    $class="alert alert-success";
                    $role="alert";
                    echo "<div class='$class' role='$role'>
                   ADD Successful
                  </div>";
                   header("location:../php/show_expense.php");
        }
        else{
            echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
        }
         
           
 
        
    
    
     ?>
