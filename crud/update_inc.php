<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Income</title>
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
                    echo $_SESSION['full_name'];
                   
                    ?></h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="../php/user_dashbord.php"><li  > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="../php/add_income.php"> <li class="active" > <span class="ps-3 name">ADD Incom</span> </li></a>
                <a href="../php/show_income.php"><li>  <span class="ps-3 name">View Income</span> </li></a>
                <a href="../php/show_saving.php"><li>  <span class="ps-3 name">View Saving</span> </li></a>
                <a href="../php/add_expense.php"><li>  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="../php/show_expense.php"><li>  <span class="ps-3 name">View Expense</span> </li></a>
                <a href="../php/show_expense.php"><li>  <span class="ps-3 name"><div class="dropdown">
                    <a class=" dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      Group
                    </a>
                  
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../php/add_user_group.php">ADD MEMBER</a></li>
                      <li><a class="dropdown-item" href="../php/show_group_user.php">View MEMBERS</a></li>
                      <li><a class="dropdown-item" href="../php/user_all_group.php">All Group</a></li>
                    </ul>
                  </div></span> </li></a>
                <a href="../php/user_profile.php"><li> <span class="ps-3 name">Profile</span> </li></a>
                <a href="../index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">UPDATE INCOME</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->

                                <?php
                                include('../database/connect.php');
                $income_id=$_GET['id'];
                if($income_id)
                {
                    
                    $query="SELECT * FROM income WHERE id=$income_id";
                    if($result=mysqli_query($connect,$query))
                       {
                        if(mysqli_num_rows($result)>0)
                          {
                              
                           while($row=mysqli_fetch_array($result))
                                          {

                       echo ' <div class="container">
                       <div class="card p-4 mt-5">
                       <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;">UPDATE INCOME</h4>
                           <div class="row g-3">
                               <div class="col-12 mb-4 balance">
                               
                               </div>
                               <form  method="post" action="#">
                               <div class="row">
                               <div class="col-lg-6 col-md-12 mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control" name="name_inc" value='.$row['name'].' placeholder="FLYING FROM">
                                       <label>Name</label>
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-12 mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control" name="describe" value='.$row['descrption'].' >
                                       <label>Describe</label>
                                   </div>
                               </div>
                              
                               <div class="col-lg-6 col-md-12 mb-3">
                                   <div class="form-floating">
                                       <input type="text" class="form-control" name="amount" value='.$row['amount'].' placeholder="FLYING TO">
                                       <label>Amount</label>
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-12" >
                                   <select style="width:100%; padding:15px 0;border-radius: 8px;">
                                       <option value="">Income into Group</option>
                                       <option value="">G101</option>
                                       <option value="">G102</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 col-md-12" >
                                   <select name="type_inc" style="width:100%; padding:15px 0;border-radius: 8px;" >
                                       <option value='.$row['type'].'>'.$row['type'].'</option>
                                       <option value="saving">Saving</option>
                                       <option value="income">income</option>
                                      
                                   </select>
                               </div>
                              
                               
                               <div class="col-lg-6 col-md-12">
                                   <div class="form-floating">
                                       <input type="date" class="form-control" name="date_inc" value='.$row['date'].' placeholder="DEPARTING">
                                       <label>Date</label>
                                   </div>
                               </div>
                           
                               <div class="col-12 mt-4">
                                  
                                   <button onClick="update_inc()"class="btn btn-primary text-uppercase" type="submit" name="submit">Update Income</button>
                                   
                               </div>
                               </div>
                               
                               
                           </form>
                           </div>
                       </div>
                   </div>';
                                          }
            }}}


            if( isset($_POST['submit']))
         {
            $name_inc=$_POST['name_inc'] ;
            $describe=$_POST['describe'] ;
            $amount=$_POST['amount'] ;
            $date_inc=$_POST['date_inc'] ;
            $type=$_POST['type_inc'];

            $query="UPDATE income  SET name='$name_inc',descrption='$describe',amount='$amount',date='$date_inc',type='$type' WHERE id=$income_id";
            $qq=mysqli_query($connect,$query);
            
           
         }

        
                
                
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