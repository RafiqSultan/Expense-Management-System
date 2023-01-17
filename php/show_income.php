<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Income</title>
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
                <h4>
                    <?php
                    session_start();
                    echo $_SESSION['full_name'];
                    
                    ?>
                </h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="user_dashbord.php"><li  > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"> <li  > <span class="ps-3 name">ADD Incom</span> </li></a>
                <a href="show_income.php"><li class="active">  <span class="ps-3 name">View Income</span> </li></a>
                <a href="add_expense.php"><li>  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="show_expense.php"><li>  <span class="ps-3 name">View Expense</span> </li></a>
                <a href="show_expense.php"><li>  <span class="ps-3 name"><div class="dropdown">
                    <a class=" dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      Group
                    </a>
                  
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="add_user_group.php">ADD MEMBER</a></li>
                      <li><a class="dropdown-item" href="show_group_user.php">View MEMBERS</a></li>
                      <li><a class="dropdown-item" href="user_all_group.php">All Group</a></li>
                    </ul>
                  </div></span> </li></a>
                <a href="user_profile.php"><li> <span class="ps-3 name">Profile</span> </li></a>
                <a href="../index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">Show INCOME</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container rounded mt-5 bg-white p-md-5">
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th> 
                                    <th scope="col">Name</th>                    
                                    <th scope="col">Describe</th>                    
                                    <th scope="col">Amount</th>                    
                                    <th scope="col">Date</th> 
                                    <th scope="col">Group</th> 
                                    <th scope="col">Action</th>                   
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr class="bg-blue rs">            
                                    <td class="pt-3 mt-1">salary</td>
                                    <td class="pt-3 mt-1">my salary</td>
                                    <td class="pt-3">6000.0</td>
                                    <td class="pt-3 mt-1">01/10/2023</td>
                                    <td class="pt-3">GA</td>
                                    <td> <a href="" class="update">Update</a><a href="" class="delete">Delete</a></td>
                                    
                                    
                                </tr>
                                <tr id="spacing-row">
                                    <td></td>
                                </tr>
                                <tr class="bg-blue rs">            
                                    <td class="pt-3 mt-1">salary</td>
                                    <td class="pt-3 mt-1">my salary</td>
                                    <td class="pt-3">6000.0</td>
                                    <td class="pt-3 mt-1">01/10/2023</td>
                                    <td class="pt-3">GA</td>
                                    <td> <a href="" class="update">Update</a><a href="" class="delete">Delete</a></td>
                                    
                                    
                                </tr>
                                <tr id="spacing-row">
                                    <td></td>
                                </tr>
                                <tr class="bg-blue">            
                                    <td class="pt-3 mt-1">salary</td>
                                    <td class="pt-3 mt-1">my salary</td>
                                    <td class="pt-3">6000.0</td>
                                    <td class="pt-3 mt-1">01/10/2023</td>
                                    <td class="pt-3">GA</td>
                                    <td> <a href="" class="update">Update</a><a href="" class="delete">Delete</a></td>
                                    
                                    
                                </tr> -->
                                <?php
                                $c1="bg-blue";
                                $pt="pt-3";
                                $c_update="update";
                                $c_delete="delete";
                                $space="spacing-row";
                                $i=1;

                                include('../database/connect.php');
                                  $query="SELECT * FROM income";
                                  if($result=mysqli_query($connect,$query))
                                     {
                                      if(mysqli_num_rows($result)>0)
                                        {
                                            
                                         while($row=mysqli_fetch_array($result))
                                                        {
                                                            echo"<tr class='$c1'>";
                                                            echo"<td class='$pt'>.$i</td>";
                                                            echo"<td class='$pt'>".$row['name']."</td>";
                                                            echo"<td class='$pt'>".$row['descrption']."</td>";
                                                            echo"<td class='$pt'>".$row['amount']."</td>";
                                                            echo"<td class='$pt'>".$row['date']."</td>";
                                                            echo"<td class='$pt'>".$row['group_id']."</td>";
                                                            echo "<td> <a class='$c_update'>Update</a><a  class='$c_delete'>Delete</a></td>";
                                                        
                                                        echo "</tr>";
                                                        echo "<tr id='$space'>";
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
                                                ?>
                                
                            </tbody>
                        </table>
                   
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