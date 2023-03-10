<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Expense</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
.fa-check,.fa-minus{
    color: blue;
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
                <h4 class="full_name_type">
                    <?php
                     /*
    --------------------------------------------
       * Check if any one use  url link to login without email and password 
    ---------------------------------------------
    */
                    $mem_type='';
                    include('../database/connect.php');
                    session_start();
                   
                    if($_SESSION["loggedIn"] != true){
                       
                        header("Location:../index.php");
                        exit;
                    }
                    echo $_SESSION['full_name'];
                    $userid=$_SESSION['user_id'];
                     /*
    --------------------------------------------
       * Check type of user 
    ---------------------------------------------
    */
                             $query ="SELECT type from users WHERE id=$userid";
                            $result = $connect->query($query);
                            if($result->num_rows> 0){
                                $type=$result->fetch_assoc();
                                $mem_type=$type;
                    ?>
                     <span><?php echo $type['type']; ?></span>
                </h4>
            </div> </div>
            <div id="navbar2" class="d-flex justify-content-end pe-4"> <span class="far fa-user-circle "></span> </div>
        </div>
        <div class="d-md-flex">
            <ul id="navbar-items" class="p-0">
                <a href="user_dashbord.php"><li  > <span class="ps-3 name ">Dashboard</span> </li></a>
                <a href="add_income.php"> <li  > <span class="ps-3 name">ADD Income | Saving</span> </li></a>
                <a href="show_income.php"><li >  <span class="ps-3 name">View Income</span> </li></a>
                <a href="show_saving.php"><li>  <span class="ps-3 name">View Saving</span> </li></a>
                <a href="add_expense.php"><li>  <span class="ps-3 name">ADD Expense</span> </li></a>
                <a href="show_expense.php"><li >  <span class="ps-3 name">View Expense</span> </li></a>
                <?php
               
                            if( ($type['type']=='leader') || ($type['type']=='member')){
                            
                            ?>
                <a  ><li class="active">  <span class="ps-3 name"><div class="dropdown">
                    <a class=" dropdown-toggle " href="#" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <div class="d-flex px-1"> <a class="active">Show MEMBERS</a>  </div>
                </div>

                <!-- *************************** Start Main****************************************** -->
                <div class="container rounded mt-5 bg-white p-md-5">
             
                        <div class="dropdown">
                            <button   class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                               All Group
                            </button>
                            <ul class="dropdown-menu">
                            <li ><a class="dropdown-item" style="color:#fff;"  href="show_all_member.php">ALL</a></li>
                            <?php
                             /*
    --------------------------------------------
       *Display all group
    ---------------------------------------------
    */
                                include('../database/connect.php');
                                $userid=$_SESSION['user_id'];
                                $query ="SELECT id,name FROM  groups inner join user_group on groups.id=user_group.group_id WHERE user_group.user_id=$userid";
                                $result = $connect->query($query);
                                if($result->num_rows> 0){
                                    while($optionData=$result->fetch_assoc()){
                                    $option =$optionData['name'];
                                    $group_id=$optionData['id'];
                                    ?>
                                   
                                   <li value="<?php echo $group_id; ?>"> <a class="dropdown-item " style="color:#fff;" href="filter_group.php?id=<?php echo $optionData['id']; ?>"><?php echo $option;?></a></li>
                                   <?php
                                    }}
                                ?> 
                           
                              
                            </ul>
                </div>
                         
                      
                           
                       
                          
                                
                           

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>                                    
                                    <th scope="col">ID</th>                    
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th> 
                                    <th scope="col">Describe</th> 
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Status</th>
                                    <?php
                                            if($type == 'leader'){
                                                echo ' <th scope="col">Action</th> ';
                                            }
                                    ?>
                                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              include('../database/connect.php');
                                $i=1;
                                $gr_id=$_GET['id'];

                                $userid=$_SESSION['user_id'];
 /*
    --------------------------------------------
       * Dispaly all data about member 
    ---------------------------------------------
    */
                                $query ="SELECT id FROM  groups inner join user_group on groups.id=user_group.group_id WHERE user_group.user_id=$userid and user_group.group_id=$gr_id";
                                $result = $connect->query($query);
                                if($result->num_rows> 0){
                                    while($g_id=$result->fetch_assoc()){ 
                                        $all_group=$gr_id;
                                        $sql="SELECT ug.user_id,u.type,u.full_name,ug.group_id,g.name ,i.date,i.name as income_name ,i.descrption ,SUM(i.amount) AS amount
                                        from user_group ug
                                        inner join users u on ug.user_id=u.id
                                        inner join groups g on ug.group_id=g.id
                                        left join income i on i.user_id=ug.user_id AND i.group_id=ug.group_id
                                        where ug.group_id =$all_group
                                        group by ug.user_id, ug.group_id";
                                         $res = $connect->query($sql);
                                         if($res->num_rows> 0){
                                             while($row=$res->fetch_assoc()){
                                               
                                                            ?>

                                                            <tr class='bg-blue'>
                                                            <td style="display:none;"> <?php echo $row['user_id']; ?> </td> 
                                                            <td style="display:none;"> <?php echo $row['group_id']; ?> </td> 
                                                            <td> <?php echo $i ?> </td>
                                                            <td> <?php echo $row['user_id']; ?> </td>
                                                            <td> <?php echo $row['full_name']; ?> </td>
                                                            <td> <?php echo $row['income_name']; ?> </td>
                                                            <td> <?php echo $row['descrption']; ?> </td>
                                                            <td> <?php echo $row['amount'] ?> </td>
                                                            <td> <?php echo $row['date'] ?> </td>
                                                            <td> <?php echo $row['name'] ?> </td>
                                                            <?php

                                                            $m=$row['amount'];
                                                            if($m ==''){
                                                                echo ' <td class="pt-3 mt-1"><i class="fa fa-circle-exclamation" style="color:rgb(235, 35,20) ; font-size: 24px;"></i></td>';
                                                            }
                                                            else{
                                                                echo '  <td class="pt-3 mt-1"><i class="far fa-circle-check" style="color:rgb(10, 167, 18) ; font-size: 24px;"></i></td>';
                                                            }

/*
    --------------------------------------------
       *if type of user = leader -> Add action delete member
    ---------------------------------------------
    */
                                                            
                                                            if($mem_type['type'] =='leader'){
                                                                $member_id=$row['user_id'];
                                                                    if($member_id != $userid ){
                                                                    echo '<td> <a type="buttan" class="deleteMember_btn delete">Delete</a></td>';
                                                                    }
                                                                    else{
                                                                    echo '<td></td>';
                                                                   
                                                                     }
                                                            }
                                                            else{ 
                                                                 
                                                                   echo '<td></td>';
                                                            }

                                                            ?>
                                                          
                                                           
                                                             
                                                           
                                                        </tr>
                                                          <?php   

                                                       echo "<tr id='spacing-row'>";
                                                       echo "<td></td>";
                                                       echo "</tr>";
                                                       $i++;
                                                      
                                                    }

                                                } 
                                               
                                            
                                        }}         
                               
                                                else
                                                {
                                                    echo "thats problem is select $query.".mysqli_error($connect)."<br>";
                                                }

                                // }
                              
                               
                                
                            
                                                ?>
                                            

                                
                            </tbody>
                        </table>
                   
                </div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Do you want delete data!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../crud/delete_member.php" method='post'>   
        <input type="hidden" name="deleteMid" id="deleteM_id" > 
        <input type="hidden" name="deleteMGid" id="deleteMG_id" >     
       
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="delete_data" class="btn btn-danger">Delete</button>
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

    <script type="text/javascript">
    $(document).ready(function(){
        $('.deleteMember_btn').on('click',function(){
            $('#deleteModal').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data)
            $('#deleteM_id').val(data[0]);
            $('#deleteMG_id').val(data[1]);
        });

    });

    
</script>
</body>
</html>