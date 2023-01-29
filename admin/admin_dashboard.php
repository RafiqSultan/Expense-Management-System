<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
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
                <a href="admin_dashboard.php"><li class="active" > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="all_user.php"> <li  > <span class="ps-3 name">All USER</span> </li></a>
                <a href="all_income.php"><li>  <span class="ps-3 name">ALL INCOME</span> </li></a>
                <a href="all_expense.php"><li>  <span class="ps-3 name">ALL EXPENSE</span> </li></a>
                <a href="all_order.php"><li>  <span class="ps-3 name">ALL ORDERS</span> </li></a>
                <a href="all_group.php"><li>  <span class="ps-3 name">ALL GROUP</span> </li></a>      
                <a href="add_group.php"><li> <span class="ps-3 name">ADD GROUP</span> </li></a>
                <a href="index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">Dashboard</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container">
                    <div class="row">
                        
                    </div>
                    <div class="row">
                  
                        <!--First Card End-->
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa-solid fa-user"></i></div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>USERS</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            
                                                            $query="SELECT COUNT(id) AS count FROM users";
                                                            $res = mysqli_query($connect,$query); 
                                                            $row = mysqli_fetch_assoc($res); 
                                                            $sum = $row['count'];
                                                            if($sum==''){
                                                                $sum=0;
                                                            }
                                                            echo "<h1>$sum </h1>";
                                                            
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                           <!--First Card End-->
                           <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <i class="fa fa-signal" aria-hidden="true"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Today Income</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            
                                                            date_default_timezone_set('Asia/Riyadh');
                                                            $date = date('Y-m-d');
    
                                                            $query="SELECT SUM(amount) AS count FROM income WHERE  date='$date'";
                                                            $res = mysqli_query($connect,$query); 
                                                            $row = mysqli_fetch_assoc($res); 
                                                            $sum = $row['count'];
                                                            if($sum==''){
                                                                $sum=0;
                                                            }
                                                            echo "<h1>$sum  <span class='sar'>SAR</span></h1>";
                                                            
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                         <!--Sec Card End-->
                         <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a  target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa fa-money-bill-transfer"></i></div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Today Exponse</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                           
                                                            date_default_timezone_set('Asia/Riyadh');
                                                            $date = date('Y-m-d');

                                                            $query="SELECT SUM(amount) AS count FROM expense WHERE  start_date='$date'";
                                                            $res = mysqli_query($connect,$query); 
                                                            $row = mysqli_fetch_assoc($res); 
                                                            $sum = $row['count'];
                                                            if($sum==''){
                                                                $sum=0;
                                                            }
                                                            echo "<h1>$sum  <span class='sar'>SAR</span></h1>";
                                                            
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                         <!--Sec Card End-->
                         <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a  target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fas fa-sack-dollar"></i></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>TOTAL INCOME</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                           
                                                            $query="SELECT SUM(amount) AS count FROM income";
                                                            $res = mysqli_query($connect,$query); 
                                                            $row = mysqli_fetch_assoc($res); 
                                                            $sum = $row['count'];
                                                            if($sum==''){
                                                                $sum=0;
                                                            }
                                                            echo "<h1>$sum  <span class='sar'>SAR</span></h1>";
                                                            
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                         <!--First Card End-->
                         <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a  target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa fa-money-bill-transfer"></i></div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>TOTAL EXPENSE</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                           
                                                            $query="SELECT SUM(amount) AS count FROM expense";
                                                            $res = mysqli_query($connect,$query); 
                                                            $row = mysqli_fetch_assoc($res); 
                                                            $sum = $row['count'];
                                                            if($sum==''){
                                                                $sum=0;
                                                            }
                                                            echo "<h1>$sum  <span class='sar'>SAR</span></h1>";
                                                            
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                         <!--First Card End-->
                         <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a  target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa-sharp fa-solid fa-people-group"></i></div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>GROUPS</h6>
                                                        <?php
                                                            include('../database/connect.php');
                    
                                                            $query="SELECT COUNT(id) AS count FROM groups";
                                                            $res = mysqli_query($connect,$query); 
                                                            $row = mysqli_fetch_assoc($res); 
                                                            $sum = $row['count'];
                                                            if($sum==0){
                                                                $sum=0;
                                                            }
                                                            echo "<h1>$sum</h1>";
                                                            
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                         <!--First Card End-->
                        
                        <!--Fifth Card End-->
                        
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