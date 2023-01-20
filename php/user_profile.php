<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_Profile</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
.form-control:focus {
  box-shadow: none;
  border-color: #0b7dda;
}

.profile-button {
  background: #0b7dda;
  box-shadow: none;
  border: none;
}

.profile-button:hover {
  background: #0c4d83;
}

.profile-button:focus {
  background: #0b7dda;
  box-shadow: none;
}

.profile-button:active {
  background: #0b7dda;
  box-shadow: none;
}

.back:hover {
  color: #682773;
  cursor: pointer;
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
                                            echo '<li><a class="dropdown-item" href="show_group_user.php">View MEMBERS</a></li>';
                                            echo '<li><a class="dropdown-item" href="user_all_group.php">All Group</a></li>';
                                        }
                                        else{
                                            echo '<li><a class="dropdown-item" href="show_group_user.php">View MEMBERS</a></li>';
                                            echo '<li><a class="dropdown-item" href="user_all_group.php">All Group</a></li>';
                                        }
                                     }
                        ?>
                    </ul>
                  </div></span> </li></a>
                  <?php
                                    }}
                                ?> 
                <a href="user_profile.php"><li class="active"> <span class="ps-3 name">Profile</span> </li></a>
                <a href="../index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">Profile</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
   <?php
     include('../database/connect.php');
    
         $id=$_SESSION['user_id'];
         $query="SELECT * FROM users WHERE id=$id";
         if($result=mysqli_query($connect,$query))
            {
             if(mysqli_num_rows($result)>0)
               {
                   
                while($row=mysqli_fetch_array($result))
              
   echo '
 <div class="container rounded bg-white mt-5">
 <div class="row">
     <div class="col-md-3 border-right">
         <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="../img/user.png" width="90">
             <span class="font-weight-bold">John Doe</span><span class="text-black-50"></span></div>
     </div>
     <div class="col-md-9">
         <div class="p-3 py-5">
         <div class="row mt-3">
         <spanclass="mt-3">Name</spanclass=>
             <div class="col-md-8"><input type="d" class="form-control"  value='.$row['id'].' readonly></div>
         </div>

             <div class="row mt-3">
             <spanclass="mt-3">Name</spanclass=>
                 <div class="col-md-8"><input type="text" class="form-control"  value='.$row['full_name'].' readonly></div>
             </div>


             <div class="row mt-3">
             <span class="mt-3">Email</span>
                 <div class="col-md-8"><input type="text" class="form-control"  value='.$row['email'].' readonly></div>
             </div>

             <div class="row mt-3">
             <span class="mt-3">Phone</span>
                 <div class="col-md-8"><input type="text" class="form-control"  value='.$row['phone'].' readonly></div>
             </div>
           
    
 </div>
</div>';
}}

?>
               

                 <!-- *************************** End Main****************************************** -->
                
                   
                </div>
            </div>
        </div>
    </div>
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>