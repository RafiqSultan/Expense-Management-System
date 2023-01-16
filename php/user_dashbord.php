<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_dashbord</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
</head>
<body>
    <div class="px-0 bg-light">
        <div class="d-flex">
            <div class="d-flex align-items-center " id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <div class="d-flex topdashboard">
                <img src="../userimg.png" width="40" height="40">
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
                <a href="user_dashbord.php"><li class="active"> <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"> <li  > <span class="ps-3 name">ADD Incom</span> </li></a>
                <a href="show_income.php"><li>  <span class="ps-3 name">View Income</span> </li></a>
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a href="#" target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <i class="fa fa-signal" aria-hidden="true"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Today Income</h6>
                                                        <h1><span>SAR</span> 80</h1>
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a href="#" target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa fa-money-bill-transfer"></i></div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Today Exponse</h6>
                                                        <h1><span>SAR</span> 80</h1>
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a href="#" target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fas fa-sack-dollar"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Total Income</h6>
                                                        <h1><span>SAR </span>1280</h1>
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a href="#" target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa fa-money-bill-transfer"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Total Expense</h6>
                                                        <h1><span>SAR </span>1280</h1>
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a href="#" target="_blank">
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa-sharp fa-solid fa-people-group"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6>Groups </h6>
                                                        <h1>2</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
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