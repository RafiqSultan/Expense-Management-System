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
    margin-left: -140px;
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
<div class="px-0 bg-light">
        <div class="d-flex">
           
                <!-- *************************** Start Main****************************************** -->
                
                <div class="container rounded mt-5 bg-white p-md-5">
                <?php
                                 $i=1;
                                 session_start();
                                 echo $_SESSION['full_name'];
                                 ?>
                    <div class="card-header card-header-report text-uppercase text-center"> <h1>expense Report</h1></div>
                


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>  
                                    <th scope="col">Item</th>                                    
                                    <th scope="col">Amount</th>                    
                                    <th scope="col">Start Data</th> 
                                    <th scope="col">End Date</th> 
                                    <th scope="col">Action</th>                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                                                                     /*
    --------------------------------------------
       * Print all expense Data into pdf 
    ---------------------------------------------
    */

                                $i=1;
                                $total_amount=0;
                                include('../database/connect.php');
                                    $userid=$_SESSION['user_id'];
                                    if (isset($_POST['submit_filter'])){
                                        $formDate=$_POST['from_date'];
                                        $toDate=$_POST['to_date'];
                                        $query="SELECT * FROM expense WHERE start_date between '$formDate' and '$toDate' and user_id= $userid";
                                     if($result=mysqli_query($connect,$query))
                                        {
                                         if(mysqli_num_rows($result)>0)
                                           {
                                               
                                            while($row=mysqli_fetch_array($result))
                                               {
                                                ?>
                                                <tr class='bg-blue'>
                                                <td style="display:none;"> <?php echo $row['id']; ?> </td> 
                                                <td> <?php echo $i ?> </td>
                                                <td> <?php echo $row['item']; ?> </td>
                                                <td> <?php echo $row['amount'] ?> </td>
                                                <td> <?php echo $row['start_date']; ?> </td>
                                                <td> <?php echo $row['end_date']; ?> </td>
                                               
                                                
                                            </tr>
                                              <?php  
                                           
                                            echo "<tr id='spacing-row'>";
                                            echo "<td></td>";
                                            echo "</tr>";
                                            $i++;
                                            $total_amount +=$row['amount'];
                                               }
                                           }}
                                               else
                                               {
                                               echo "null record";    
                                               }                  
                                            }
                                            else if(isset($_POST['close']) or $i==1) {   
                                  $query="SELECT * FROM expense WHERE user_id=$userid ";
                                  if($result=mysqli_query($connect,$query))
                                     {
                                      if(mysqli_num_rows($result)>0)
                                        {
                                            
                                         while($row=mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <tr class='bg-blue'>
                                                            <td style="display:none;"> <?php echo $row['id']; ?> </td> 
                                                            <td> <?php echo $i ?> </td>
                                                            <td> <?php echo $row['item']; ?> </td>
                                                            <td> <?php echo $row['amount'] ?> </td>
                                                            <td> <?php echo $row['start_date']; ?> </td>
                                                            <td> <?php echo $row['end_date']; ?> </td>
                                                           
                                                            
                                                        </tr>
                                                          <?php  
                                                       
                                                        echo "<tr id='spacing-row'>";
                                                        echo "<td></td>";
                                                        echo "</tr>";
                                                        $i++;
                                                        $total_amount +=$row['amount'];
                                                        }
                                                        // echo"</table>";
                                                        // mysqli_free_result($result);
                                                    }
                                                    
                                                    else
                                                    {
                                                    echo "null record";    
                                                    }
                                                }
                                                else
                                                {
                                                    echo "thats problem is select $query.".mysqli_error($connect)."<br>";
                                                }
                                            }
                                                ?>

                                
                            </tbody>
                        </table>
                        <div class="card-head border border-info p-2"><h5> <span style="color:#0b7dda;">Total Amount : </span> <?php echo $total_amount; ?></h5></div>
                </div>


                 <!-- *************************** End Main****************************************** -->
                
                   
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>