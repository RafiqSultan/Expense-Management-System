<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Expense</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
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
    margin-left: -100px;
}
@media(max-width:575px){
    .container{
        width: 125%;
        padding: 20px 10px;
    }
}
    </style>
</head>
<body>
    <div class="px-0 bg-light">
        <div class="d-flex">
            <div class="d-flex align-items-center " id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <div class="d-flex topdashboard">
            <img src="../img/user.png" width="40" height="40">
                <h4>
                    <?php
                    session_start();
                    if($_SESSION["loggedIn"] != true){
                       
                        header("Location:../index.php");
                        exit;
                    }
                    echo $_SESSION['full_name'];
                   
                    ?>
                </h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="user_dashbord.php"><li  > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"><li>  <span class="ps-3 name">ADD Income | Saving</span> </li></a>
                <a href="show_income.php"><li >  <span class="ps-3 name">View Income</span> </li></a>
                <a href="show_saving.php"><li>  <span class="ps-3 name">View Saving</span> </li></a>
                <a href="add_expense.php"><li>  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="show_expense.php"><li class="active">  <span class="ps-3 name">View Expense</span> </li></a>
                <?php
                include('../database/connect.php');
                             $userid=$_SESSION['user_id'];
                             $query ="SELECT type from users WHERE id=$userid";
                            $result = $connect->query($query);
                            if($result->num_rows> 0){
                                $type=$result->fetch_assoc();
                            if( ($type['type']=='leader') || ($type['type']=='member')){
                            
                            ?>
                <a href="show_expense.php"><li>  <span class="ps-3 name"><div class="dropdown">
                    <a class=" dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      Group
                    </a>
                  
                    <ul class="dropdown-menu">
                    <?php
                            
                            $userid=$_SESSION['user_id'];
                                  $query="SELECT type FROM users WHERE id=$userid";
                                  if($result=mysqli_query($connect,$query))
                                     {
                                        
                                        $row = mysqli_fetch_assoc($result);                                     
                                        $type = $row['type'];

                                        if($type=='leader'){
                                            echo '<li><a class="dropdown-item" href="add_user_group.php">ADD MEMBER</a></li>';
                                            echo '<li><a class="dropdown-item" href="show_all_member.php">View MEMBERS</a></li>';
                                            echo '<li><a class="dropdown-item" href="show_all_group.php">All Group</a></li>';
                                        }
                                        else{
                                            echo '<li><a class="dropdown-item" href="show_all_member.php">View MEMBERS</a></li>';
                                            echo '<li><a class="dropdown-item" href="show_all_group.php">All Group</a></li>';
                                        }
                                     }
                        ?>
                    </ul>
                  </div></span> </li></a>
                  <?php
                                    }}
                                ?> 
                                <a href="add_order.php"><li>  <span class="ps-3 name">Order</span> </li></a>
                <a href="myorder.php"><li>  <span class="ps-3 name">View Order</span> </li></a>
                <a href="user_profile.php"><li> <span class="ps-3 name">Profile</span> </li></a>
                <a href="../index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">Show EXPENSE</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container rounded mt-5 bg-white p-md-5">
                <div>
                            <div class=" row" ><a href="../crud/expense_report.php" class="print" title="print"><i class="fa-solid fa-print"></i></a></div>
                        </div>
                <div class="card-body">

<form class="form" action="#" method="post">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                    <label>From Date</label>
                    <input type="date"  name="from_date" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label>To Date</label>
                    <input type="date"  name="to_date" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label></label>
                    <button class="btn btn-primary form-control" type="submit" name="submit_filter">Filter</button>
                    
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label></label>
                <button type="submit" name="close" class="btn-close form-control mt-1" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                    
                </div>
            </div>
        </div>
    </form>
    </div>
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
                                $i=1;
                    
                                include('../database/connect.php');
                                    $userid=$_SESSION['user_id'];
                                    if (isset($_POST['submit_filter'])){
                                        $formDate=$_POST['from_date'];
                                        $toDate=$_POST['to_date'];
                                        if(empty($toDate)){
                                            date_default_timezone_set('Asia/Riyadh');
                                            $toDate = date('Y-m-d');
                                         }
                                       
                                        $query="SELECT * FROM expense WHERE start_date between '$formDate' and '$toDate' or end_date between '$formDate' and '$toDate' and  user_id= $userid";
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
                                               
                                                 <?php
                                                 echo "<td> <a href='../crud/update_exp.php?id=$row[0]' class='update'>Update</a></td>";
                                                 ?>
                                               <td> <a type="buttan" class='deleteExp_btn delete'>Delete</a></td>
                                            </tr>
                                              <?php  
                                           
                                            echo "<tr id='spacing-row'>";
                                            echo "<td></td>";
                                            echo "</tr>";
                                            $i++;
                                               }
                                           }}
                                               else
                                               {
                                               echo "null record";    
                                               }                  
                                            }
                                            else if(isset($_POST['close']) or $i==1)
                                            
                                            {   
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
                                                           
                                                             <?php
                                                             echo "<td> <a href='../crud/update_exp.php?id=$row[0]' class='update'>Update</a></td>";
                                                             ?>
                                                           <td> <a type="buttan" class='deleteExp_btn delete'>Delete</a></td>
                                                        </tr>
                                                          <?php  
                                                       
                                                        echo "<tr id='spacing-row'>";
                                                        echo "<td></td>";
                                                        echo "</tr>";
                                                        $i++;
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
                   
                </div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Do you want delete data!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../crud/delete_exp.php" method='post'>   
        <input type="hidden" name="deleteExpid" id="deleteExp_id" >    
       
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="delete_data" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>


                 <!-- *************************** End Main****************************************** -->
                
                   
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function(){
        $('.deleteExp_btn').on('click',function(){
            $('#deleteModal').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data)
            $('#deleteExp_id').val(data[0]);
        });

    });
</script>
</body>
</html>