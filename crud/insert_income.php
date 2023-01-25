<?php
$type=" ";

        include("../database/connect.php");
        session_start();
        $userid=$_SESSION['user_id'];
        $name_inc=$_POST['name_inc'] ;
        $describe=$_POST['describe'] ;
        $amount=$_POST['amount'] ;
        $date_inc=$_POST['date_inc'] ;
       
        $type_inc=$_POST['type_inc'];
        $query ="SELECT type from users WHERE id=$userid";
        $res = $connect->query($query);
        if($res->num_rows> 0){
            $ty=$res->fetch_assoc();
           $type=$ty['type'];
        }
// ------------------------------
        if($type == 'user'){
            
            $query= "INSERT INTO  income (name, descrption, date, amount,type, user_id)
            VALUES
            ('$name_inc' , '$describe' , '$date_inc' , $amount , '$type_inc' ,$userid)";
            echo $query;
            if($result=mysqli_query($connect , $query))
            {
                if($type== 'saving')
                {
                    header("location:../php/show_saving.php");
                }
                else{
                    header("location:../php/show_income.php");
                }
                     
            }
            else{
                echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
            }

        }
        
        else{
            $group_id=$_POST['group_name'];
            if ($group_id == 'null'){
            
                $query= "INSERT INTO  income (name, descrption, date, amount,type, user_id)
                VALUES
                ('$name_inc' , '$describe' , '$date_inc' , $amount , '$type_inc' ,$userid)";
                echo $query;
                if($result=mysqli_query($connect , $query))
                {
                    if($type== 'saving')
                    {
                        header("location:../php/show_saving.php");
                    }
                    else{
                        header("location:../php/show_income.php");
                    }
                         
                }
                else{
                    echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
                }
            }
    
           else{
            $query= "INSERT INTO  income (name, descrption, date, amount,type, user_id,group_id)
            VALUES
            ('$name_inc' , '$describe' , '$date_inc' , $amount , '$type_inc' ,$userid,$group_id)";
            echo $query;
            if($result=mysqli_query($connect , $query))
            {
                if($type== 'saving')
                    {
                        header("location:../php/show_saving.php");
                    }
                    else{
                        header("location:../php/show_income.php");
                    }
                     
            }
            else{
                echo "thats problem in insert $query.".mysqli_error($connect)."<br>";
            }
           }

        }


       
        
       

           
          

        
       
           
 
        
    
    
     ?>