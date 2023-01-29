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
<?php
include('../database/connect.php');
session_start();
$userid=$_SESSION['user_id'];
$count_group=0;
  $quv ="SELECT count(user_id) as count from user_group WHERE user_id=$userid";
  $resv = $connect->query($quv);
  if($resv->num_rows> 0){
      $tyv=$resv->fetch_assoc();
     $count_group=$tyv['count'];
  }
  if($count_group == 0){
  
        $qu ="UPDATE users SET type='user' WHERE id=$userid";
        $re = $connect->query($qu);
      }
      else
      {
          echo '<script> alert("Data Not Deleted"); </script>';
      }




?>
    <div class="px-0 bg-light">
        <div class="d-flex">
            <div class="d-flex align-items-center " id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <div class="d-flex topdashboard">
                <img src="../img/user.png" width="40" height="40">
                <h4 class="full_name_type">
                    <?php

                    include('../database/connect.php');
                   
                   
                    if($_SESSION["loggedIn"] != true){
                       
                        header("Location:../index.php");
                        exit;
                    }
                    echo $_SESSION['full_name'];
                    $userid=$_SESSION['user_id'];
                             $query ="SELECT type from users WHERE id=$userid";
                            $result = $connect->query($query);
                            if($result->num_rows> 0){
                                $type=$result->fetch_assoc();
                            
                    ?>
                     <span><?php echo $type['type']; ?></span>
                </h4>
              
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="user_dashbord.php"><li class="active"> <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"> <li  > <span class="ps-3 name">ADD Income | Saving</span> </li></a>
                <a href="show_income.php"><li>  <span class="ps-3 name">View Income</span> </li></a>
                <a href="show_saving.php"><li>  <span class="ps-3 name">View Saving</span> </li></a>
                <a href="add_expense.php"><li>  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="show_expense.php"><li>  <span class="ps-3 name">View Expense</span> </li></a>
                <?php
               
                             
                            if( ($type['type']=='leader') || ($type['type']=='member')){
                            
                            ?>
                <a ><li>  <span class="ps-3 name"><div class="dropdown">
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a>
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <i class="fa fa-signal" aria-hidden="true"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6 class="text-uppercase">Today Income</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            $userid=$_SESSION['user_id'];
                                                            date_default_timezone_set('Asia/Riyadh');
                                                            $date = date('Y-m-d');
    
                                                            $query="SELECT SUM(amount) AS count FROM income WHERE user_id=$userid and type='income' and date='$date'";
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a >
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa fa-money-bill-transfer"></i></div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6 class="text-uppercase">Today Expense</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            $userid=$_SESSION['user_id'];
                                                            date_default_timezone_set('Asia/Riyadh');
                                                            $date = date('Y-m-d');

                                                            $query="SELECT SUM(amount) AS count FROM expense WHERE user_id=$userid and start_date='$date'";
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a >
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fas fa-sack-dollar"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6 class="text-uppercase">Total Income</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            $userid=$_SESSION['user_id'];
                                                            $query="SELECT SUM(amount) AS count FROM income WHERE user_id=$userid and type='income'";
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
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                    <div class="card cssanimation2 fadeInBottom2"> <a >
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fas fa-sack-dollar"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6 class="text-uppercase">Total Saving</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            $userid=$_SESSION['user_id'];
                                                            $query="SELECT SUM(amount) AS count FROM income WHERE user_id=$userid and type='saving'";
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a >
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa fa-money-bill-transfer"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6 class="text-uppercase">Total Expense</h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            $userid=$_SESSION['user_id'];
                                                            $query="SELECT SUM(amount) AS count FROM expense WHERE user_id=$userid";
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
                                    <div class="card cssanimation2 fadeInBottom2"> <a >
                                            <div class="card-body">
                                                <div class="row" id="blockitems">
                                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"><i class="fa-sharp fa-solid fa-people-group"></i> </div>
                                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                                        <h6 class="text-uppercase">Groups </h6>
                                                        <?php
                                                            include('../database/connect.php');
                                                            $userid=$_SESSION['user_id'];
                                                            $query="SELECT COUNT(group_id) AS count FROM  user_group WHERE user_id=$userid";
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