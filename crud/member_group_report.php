<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Expense</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .h2{
    color: #111;
    font-family: 'PT Sans', sans-serif;
}
th{
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
    font-size: 14px !important;
    color: #121286 !important;
    border-bottom: 2px solid #121286 !important;
}

tbody .bg-blue{
    background-color: #d6ebf7;
    border-radius: 8px;
}
#spacing-row{
    height: 8px;
}
.fa-check,.fa-minus{
    color: blue;
}

.table thead th,.table td{
    border: none;
}

.table tbody td:first-child{
    border-bottom-left-radius: 10px;
    border-top-left-radius: 10px;
}
.table tbody td:last-child{
    border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
}
.update{
    background-color: rgb(45, 218, 88);
    padding: 5px 15px;
    line-height: 30px;
    color: #fff;
    font-weight: 500;
}
.update:hover{
    background-color: rgb(23, 141, 53);
    color: #fff;
    font-weight: 500;
}
.delete:hover{
    background-color: rgb(146, 37, 37);
    color: #fff;
    font-weight: 500;
}
.delete{
    background-color: rgb(224, 45, 45);
    padding: 5px 15px;
    line-height: 30px;
    color: #fff;
    font-weight: 500;
    margin-left: 10px;
}
@media(max-width:575px){
    .container{
        width: 125%;
        padding: 20px 10px;
    }
}
    </style>
</head>
<body onload="print()">
<div class="container rounded mt-5 bg-white p-md-5">
<div class="card-header card-header-report text-uppercase text-center"> <h1>members group</h1></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>                                    
                                    <th scope="col">ID</th>                    
                                    <th scope="col">User Name</th>
                           
                                    <th scope="col">Amount</th> 
                                    <th scope="col">Group</th>
                                    <th scope="col">Status</th>
                                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
     /*
    --------------------------------------------
       * Display all information data from income ,group ,user_group...........
    ---------------------------------------------
    */
                                $i=1;
                                $total_amount=0;
                                include('../database/connect.php');
                                session_start();
                                $userid=$_SESSION['user_id'];
                                $query ="SELECT id FROM  groups inner join user_group on groups.id=user_group.group_id WHERE user_group.user_id=$userid";
                                $result = $connect->query($query);
                                if($result->num_rows> 0){
                                    while($g_id=$result->fetch_assoc()){ 
                                        $all_group=$g_id['id'];
                                        $sql="SELECT ug.user_id,u.type,u.full_name,ug.group_id,g.name ,SUM(i.amount) AS amount
                                        from user_group ug
                                        inner join users u on ug.user_id=u.id
                                        inner join groups g on ug.group_id=g.id
                                        left join income i on i.user_id=ug.user_id AND i.group_id=ug.group_id
                                        where ug.group_id IN($all_group)
                                        group by ug.user_id, ug.group_id";
                                         $res = $connect->query($sql);
                                         if($res->num_rows> 0){
                                             while($row=$res->fetch_assoc()){
                                               
                                                            ?>

                                                            <tr class='bg-blue'>
                                                            <td style="display:none;"> <?php echo $row['id']; ?> </td> 
                                                            <td> <?php echo $i ?> </td>
                                                            <td> <?php echo $row['user_id']; ?> </td>
                                                            <td> <?php echo $row['full_name']; ?> </td>
                                    
                                                            <td> <?php echo $row['amount'] ?> </td>
                                                            <td> <?php echo $row['name'] ?> </td>
                                                            <?php

                                                            $m=$row['amount'];
                                                            if($m ==''){
                                                                echo ' <td class="pt-3 mt-1"><i class="fa fa-circle-exclamation" style="color:rgb(235, 35,20) ; font-size: 24px;"></i></td>';
                                                            }
                                                            else{
                                                                echo '  <td class="pt-3 mt-1"><i class="far fa-circle-check" style="color:rgb(10, 167, 18) ; font-size: 24px;"></i></td>';
                                                            }

                                                            ?>
                                                          
                                                           
                                                        
                                                        </tr>
                                                          <?php   

                                                       echo "<tr id='spacing-row'>";
                                                       echo "<td></td>";
                                                       echo "</tr>";
                                                       $i++;
                                                       $total_amount +=$row['amount'];
                                                      
                                                    }

                                                } 
                                               
                                            
                                        }}         
                               
                                                else
                                                {
                                                    echo "thats problem is select $query.".mysqli_error($connect)."<br>";
                                                }
                            
                                                ?>

                                
                            </tbody>
                        </table>
                        <div class="card-head border border-info p-2"><h5> <span style="color:#0b7dda;">Total Amount : </span> <?php echo $total_amount; ?></h5></div>;
                </div>


                 <!-- *************************** End Main****************************************** -->
                
                   
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

</html>