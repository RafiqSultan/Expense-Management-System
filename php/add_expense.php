<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
</head>
<body>
    <div class="px-0 bg-light">
        <div class="d-flex">
            <div class="d-flex align-items-center " id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <div class="d-flex topdashboard">
                <img src="../userimg.png" width="40" height="40">
                <h4>Anas Qahtan</h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="user_dashbord.php"><li  > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"> <li  > <span class="ps-3 name">ADD Incom</span> </li></a>
                <a href="show_income.php"><li>  <span class="ps-3 name">View Income</span> </li></a>
                <a href="add_expense.php"><li class="active">  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="show_expense.php"><li >  <span class="ps-3 name">View Expense</span> </li></a>
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
                    <div class="d-flex px-1"> <a href="#home" class="active">ADD EXPENSE</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container">
                    <div class="card p-4 mt-5">
                    <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;">ADD Expense</h4>
                        <div class="row g-3">
                            <div class="col-12 mb-4 balance">
                                <?php
                                    include("../database/connect.php");
                                    session_start();
                                    $userid = $_SESSION['user_id'];
                                    
                                    $query="SELECT SUM(amount) FROM income AS total  where user_id='$userid'";
                                    $result = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($result);
                                    $sum = $row['SUM(amount)'];
                                    // -------------------------
                                    $query="SELECT SUM(amount) FROM income AS total  where user_id='$userid'";
                                    $result = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($result);
                                    $sum = $row['SUM(amount)'];
                                    echo " <h4>Your Current Balance is : <span>$sum</span></h4> ";
                                ?>
                               
                               
                            </div>
                            <form  method="post" action="../crud/insert_expense.php">
                            <div class="row">
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="item" placeholder="FLYING FROM">
                                    <label>Item</label>
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="amount" placeholder="FLYING TO">
                                    <label>Amount</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="start_date" placeholder="DEPARTING">
                                    <label>Date Start</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-floating">
                                    <input type="date" class="form-control"name="end_date" placeholder="DEPARTING">
                                    <label>Date End</label>
                                </div>
                            </div>
                            
                        
                            <div class="col-12 mt-4">
                               
                                <button class="btn btn-primary text-uppercase" type="submit" name="submit">Add Expense</button>
                                <button class="btn btn-secondary text-uppercase" type="button">Reset</button>
                            </div>
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
</body>
</html>