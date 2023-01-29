<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All group</title>
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
<body>
    <div class="px-0 bg-light">
        <div class="d-flex">
            <div class="d-flex align-items-center " id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <div class="d-flex topdashboard">
                <img src="../img/user.png" width="40" height="40">
                <h4 class="full_name_type">
                    <?php

                    include('../database/connect.php');
                    session_start();
                   
                    if($_SESSION["loggedIn"] != true){
                       
                        header("Location:index.php");
                        exit;
                    }
                    echo $_SESSION['admin_name'];
                ?>
                     <span>Admin</span>
                </h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="admin_dashboard.php"><li > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="all_user.php"> <li  > <span class="ps-3 name">All USER</span> </li></a>
                <a href="all_income.php"><li>  <span class="ps-3 name">ALL INCOME</span> </li></a>
                <a href="all_expense.php"><li>  <span class="ps-3 name">ALL EXPENSE</span> </li></a>
                <a href="all_order.php"><li>  <span class="ps-3 name">ALL ORDERS</span> </li></a>
                <a href="all_group.php"><li class="active">  <span class="ps-3 name">ALL GROUP</span> </li></a>      
                <a href="add_group.php"><li> <span class="ps-3 name">ADD GROUP</span> </li></a>
                <a href="index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">All Groups</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container rounded mt-5 bg-white p-md-5">
                    
               
                    <div class="card-body">
                                    
                <form class="form" action="#" method="post">
                        <div class="row justify-content-center">
                          

                            
                        <div class="col-md-8 ">

                            <div class=" search">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control" name="search" placeholder="Search">
                           
                            </div>
                            
                        </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label></label>
                                    <button class="btn btn-primary form-control" type="submit" name="submit_search">Search</button>
                                    
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
                                    <th scope="col">Group_ID</th>                    
                                    <th scope="col">Name</th>                    
                                    <th scope="col">Capacity</th>
                                    <th scope="col">Date_Create</th>  
                                    <th scope="col">Leader</th>
                                    <th scope="col">Number of User</th> 
                                    <th scope="col">Action</th>                   
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php
                                $i=1;
                    
                                include('../database/connect.php');
                                if (isset($_POST['submit_search'])){
                                    $name=$_POST['search'];
                                    $query="SELECT groups.id,groups.name,groups.capacity,groups.date_create,users.full_name 
                                    FROM groups
                                   inner join user_group on user_group.group_id=groups.id
                                   inner join users on users.id=user_group.user_id 
                                   WHERE users.type='leader' and groups.name like '%$name%'
                                   group by user_group.group_id";
                                   if($result=mysqli_query($connect,$query))
                                      {
                                       if(mysqli_num_rows($result)>0)
                                         {
                                            
                                             
                                          while($row=mysqli_fetch_array($result))
                                                         {
                                                             $groupid=$row['id'];
                                                            
                                                             $sql="SELECT COUNT(user_id) as count from user_group where group_id=$groupid";
                                                                 $res = mysqli_query($connect, $sql);
                                                                 $count = mysqli_fetch_assoc($res);
                                                           
                                                     
                                                             ?>
                                                             <tr class='bg-blue'>
                                                             
                                                             <td> <?php echo $i ?> </td>
                                                             <td> <?php echo $row['id']; ?> </td>
                                                             <td> <?php echo $row['name'] ?> </td>
                                                             <td> <?php echo $row['capacity']; ?> </td>
                                                             <td> <?php echo $row['date_create']; ?> </td>
                                                             <td> <?php echo $row['full_name']; ?> </td>
                                                             <td> <?php echo $count['count']; ?> </td>
                                                              <?php
                                                              echo "<td> <a href='update_group.php?id=$row[0]' class='update'>Update</a></td>";
                                                              ?>
                                                            <td> <a type="buttan" class='deleteInc_btn delete'>Delete</a></td>
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
                            

                              else if(isset($_POST['close']) or $i==1) {
                                  $query="SELECT groups.id,groups.name,groups.capacity,groups.date_create,users.full_name 
                                   FROM groups
                                  inner join user_group on user_group.group_id=groups.id
                                  inner join users on users.id=user_group.user_id 
                                  WHERE users.type='leader'
                                  group by user_group.group_id";
                                  if($result=mysqli_query($connect,$query))
                                     {
                                      if(mysqli_num_rows($result)>0)
                                        {
                                           
                                            
                                         while($row=mysqli_fetch_array($result))
                                                        {
                                                           
                                                            $groupid=$row['id'];
                                                           
                                                            $sql="SELECT COUNT(user_id) as count from user_group where group_id=$groupid";
                                                                $res = mysqli_query($connect, $sql);
                                                                $count = mysqli_fetch_assoc($res);
                                                          
                                                    
                                                            ?>
                                                            <tr class='bg-blue'>
                                                            
                                                            <td> <?php echo $i ?> </td>
                                                            <td> <?php echo $row['id']; ?> </td>
                                                            <td> <?php echo $row['name'] ?> </td>
                                                            <td> <?php echo $row['capacity']; ?> </td>
                                                            <td> <?php echo $row['date_create']; ?> </td>
                                                            <td> <?php echo $row['full_name']; ?> </td>
                                                            
                                                            <td> <?php echo $count['count']; ?> </td>
                                                             <?php
                                                             echo "<td> <a href='update_group.php?id=$row[0]' class='update'>Update</a></td>";
                                                             ?>
                                                           <td> <a type="buttan" class='deleteInc_btn delete'>Delete</a></td>
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
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Do you want delete data!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method='post' action="delete_group.php" >   
        <input type="hidden" name="deleteIncid" id="deleteInc_id" >
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
        $('.deleteInc_btn').on('click',function(){
            $('#deletemodal').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data)
            $('#deleteInc_id').val(data[1]);
        });

    });
</script>
</body>
</html>