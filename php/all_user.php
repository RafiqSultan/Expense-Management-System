<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All user</title>
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
                <img src="../userimg.png" width="40" height="40">
                <h4>Admin</h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="admin_dashboard.php"><li > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="all_user.php"> <li class="active" > <span class="ps-3 name">All USER</span> </li></a>
                <a href="all_income.php"><li>  <span class="ps-3 name">ALL INCOME</span> </li></a>
                <a href="all_expense.php"><li>  <span class="ps-3 name">ALL EXPENSE</span> </li></a>
                <a href="all_group.php"><li>  <span class="ps-3 name">ALL GROUP</span> </li></a>      
                <a href="add_group.php"><li> <span class="ps-3 name">ADD GROUP</span> </li></a>
                <a href="../index.php"><li> <span class="ps-3 name">Logout</span> </li></a>
            </ul>
            <div id="topnavbar">
                <div class="topnav mb-3">
                    <div class="d-flex px-1"> <a href="#home" class="active">All Users</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container rounded mt-5 bg-white p-md-5">
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>                    
                                    <th scope="col">ID</th>                    
                                    <th scope="col">Name</th>                    
                                    <th scope="col">Email</th> 
                                    <th scope="col">Phone</th>
                                    <th scope="col">Type</th> 
                                    <th scope="col">Action</th>                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-blue rs">            
                                    <td class="pt-3 mt-1">1</td>
                                    <td class="pt-3 mt-1">17</td>
                                    <td class="pt-3">Anas alQahtan</td>
                                    <td class="pt-3 mt-1">anas@gmail.com</td>
                                    <td class="pt-3">5587227828</td>
                                    <td class="pt-3">user</td>
                                    <td><a href="" class="delete">Delete</a></td>
                                    
                                </tr>
                                <tr id="spacing-row">
                                    <td></td>
                                </tr>
                                <tr class="bg-blue rs">            
                                    <td class="pt-3 mt-1">2</td>
                                    <td class="pt-3 mt-1">13</td>
                                    <td class="pt-3">Fahd  fahd</td>
                                    <td class="pt-3 mt-1">fhad@gmail.com</td>
                                    <td class="pt-3">5587227828</td>
                                    <td class="pt-3">user</td>
                                    <td><a href="" class="delete">Delete</a></td>
                                    
                                </tr>
                                
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