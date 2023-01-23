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
    
</head>
<body>
    <div class="px-0 bg-light">
        <div class="d-flex">
            <div class="d-flex align-items-center " id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <div class="d-flex topdashboard">
                <img src="../img/user.png" width="40" height="40">
                <h4>  <?php
                    session_start();
                    if($_SESSION["loggedIn"] != true){
                       
                        header("Location:../index.php");
                        exit;
                    }
                    echo $_SESSION['full_name'];
                   
                    ?></h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="user_dashbord.php"><li  > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"> <li  > <span class="ps-3 name">ADD Incom</span> </li></a>
                <a href="show_income.php"><li>  <span class="ps-3 name">View Income</span> </li></a>
                <a href="show_saving.php"><li>  <span class="ps-3 name">View Saving</span> </li></a>
                <a href="add_expense.php"><li>  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="show_expense.php"><li>  <span class="ps-3 name">View Expense</span> </li></a>
                <?php
                include('../database/connect.php');
                             $userid=$_SESSION['user_id'];
                             $query ="SELECT type from users WHERE id=$userid";
                            $result = $connect->query($query);
                            if($result->num_rows> 0){
                                $type=$result->fetch_assoc();
                            if( ($type['type']=='leader') || ($type['type']=='member')){
                            
                            ?>
                <a ><li class="active">  <span class="ps-3 name"><div class="dropdown">
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
                <a ><li > <span class="ps-3 name">Profile</span> </li></a>
                <a href="../index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">ADD USER INTO GROUP</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container">
                    <div class="card p-4 mt-5">
                        <div class="row g-3">
                            <div class="col-12 mb-4">
                            <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;color:#21214e;text-decoration: underline;">ADD MEMBER</h4>
                               
                            </div>
                            
                            <form action="#" method='post'>
                            <div class="row g-3">
                           
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="umber" class="form-control" name="member_id" placeholder="FLYING FROM">
                                    <label>User_ID</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" >
                                <select style="width:100%; padding:15px 0;border-radius: 8px;" name="group_name">
                                <?php
                                include('../database/connect.php');
                                $userid=$_SESSION['user_id'];
                                $query ="SELECT id,name FROM  groups inner join user_group on groups.id=user_group.group_id WHERE user_group.user_id=$userid";
                                $result = $connect->query($query);
                                if($result->num_rows> 0){
                                    while($optionData=$result->fetch_assoc()){
                                    $option =$optionData['name'];
                                    $group_id=$optionData['id'];
                                    ?>
                                   <option value="<?php echo $group_id; ?>"><?php echo $option;?></option>
                                   <?php
                                    }}
                                ?> 
                                </select>
                            </div>
                            
                        
                            <div class="col-12 mt-4">
                               
                                <button class="btn btn-primary text-uppercase" type="submit" name="submit">Add Member</button>
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
    <?php
    if( isset($_POST['submit'])){
        include("../database/connect.php");
        $member_id=$_POST['member_id'] ;
        $group_id=$_POST['group_name'] ;
   
        $query= "INSERT INTO  user_group(user_id ,group_id)
        VALUES
        ($member_id ,$group_id)";
        
        if($result=mysqli_query($connect,$query))
        {
            $sql = "UPDATE users SET type='member' WHERE id=$member_id";
            if (mysqli_query($connect,$sql))
             {
                header("location:user_dashbord.php");  
              }
        }
        }
 
    else{
        echo "thats problem is select $query.".mysqli_error($connect)."<br>";
        }
     ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>