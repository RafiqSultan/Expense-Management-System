<?php
        include("../database/connect.php");
        session_start();
        $name_inc=$_POST['name_inc'] ;
        $describe=$_POST['describe'] ;
        $amount=$_POST['amount'] ;
        $date_inc=$_POST['date_inc'] ;
        $userid=$_SESSION['user_id'];
        $type=$_POST['type_inc'];
        $group_id=$_POST['group_name'];
        echo $group_id;
        if ($group_id == 'null'){
            
            $query= "INSERT INTO  income (name, descrption, date, amount,type, user_id)
            VALUES
            ('$name_inc' , '$describe' , '$date_inc' , $amount , '$type' ,$userid)";
            echo $query;
            if($result=mysqli_query($connect , $query))
            {
                
                       header("location:../php/show_income.php");
            }
            else{
                echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
            }
        }

       else{
        $query= "INSERT INTO  income (name, descrption, date, amount,type, user_id,group_id)
        VALUES
        ('$name_inc' , '$describe' , '$date_inc' , $amount , '$type' ,$userid,$group_id)";
        echo $query;
        if($result=mysqli_query($connect , $query))
        {
            
                   header("location:../php/show_income.php");
        }
        else{
            echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
        }
       }
       
           
 
        
    
    
     ?>