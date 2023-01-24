<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add group</title>
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
                <h4>Admin</h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="admin_dashboard.php"><li > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="all_user.php"> <li  > <span class="ps-3 name">All USER</span> </li></a>
                <a href="all_income.php"><li>  <span class="ps-3 name">ALL INCOME</span> </li></a>
                <a href="all_expense.php"><li>  <span class="ps-3 name">ALL EXPENSE</span> </li></a>
                <a href="all_group.php"><li >  <span class="ps-3 name">ALL GROUP</span> </li></a>      
                <a href="add_group.php"><li class="active"> <span class="ps-3 name">ADD GROUP</span> </li></a>
                <a href="index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">Add Group</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container">
                    <div class="card p-4 mt-5">
                    <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;color:#21214e;text-decoration: underline;">ADD group</h4>
                        <div class="row g-3">
                            <form action="#" method="post">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="text"  name="g_name" class="form-control" placeholder="FLYING FROM" required>
                                    <label>Group Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="number" name="capacity" class="form-control" placeholder="FLYING FROM" required>
                                    <label>Capacity</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="number"  name="leader" class="form-control" placeholder="FLYING FROM" required>
                                    <label>Leader_Id</label>
                                </div>
                            </div>
                           
                            
                        
                            <div class="col-12 mt-4">
                               
                                <button class="btn btn-primary text-uppercase" type="submit" name="submit">Add Group</button>
                                <button class="btn btn-secondary text-uppercase" type="reset">Reset</button>
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
        $name=$_POST['g_name'] ;
        $capacity=$_POST['capacity'] ;
        $leader=$_POST['leader'] ;
   
        $query= "INSERT INTO  groups(name , capacity,admin_id)
        VALUES
        ('$name' , $capacity ,1)";
        
        if($result=mysqli_query($connect,$query))
        {
            $last_group_id = mysqli_insert_id($connect);
            $sql = "UPDATE users SET type='leader' WHERE id=$leader";
            if (mysqli_query($connect,$sql))
             {
                $q= "INSERT INTO  user_group(user_id ,group_id) VALUES ($leader,$last_group_id)";
                mysqli_query($connect,$q);
                header("location:admin_dashboard.php");  
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