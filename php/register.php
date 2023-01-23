<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    
</head>
</head>
<body>
    <div class="loginbox"> 
        <h2>Create Account</h2>
        <form method="post" action="#">
            <p>Full Name</p> <input type="text" name="fullname" placeholder="Enter Full Name" required>
            <p>Email</p> <input type="text" name="email" placeholder="Enter Email" required>
            <p>Phone</p> <input type="text" name="phone" placeholder="Enter Your Phone">
            <p>Gender</p>
            <div class="gender">
                <div><input type="radio" id="gender" name="gender" value="male" required></div>
                <div><label>Male</label></div>
                <div class="inp2"><input type="radio" id="gender" name="gender" value="female" required></div>
                <div><label>Female</label></div>
            </div> 
            
            <p>Password</p> <input type="password" name="password" placeholder="Enter Password" required>
            <p>Repeat Password</p> <input type="password" name="rep_password" placeholder="Repeat Password" required>
             <input type="submit" name="submit" value="Register">
               <a href="../index.php">have an account?</a>
        </form>
    </div>
    <?php
    if( isset($_POST['submit'])){
        include("../database/connect.php");
        session_start();
        $full_name=$_POST['fullname'] ;
        $email=$_POST['email'] ;
        $phone=$_POST['phone'] ;
        $gender=$_POST['gender'] ;
        $pass=$_POST['password'] ;
        $rep_pass=$_POST['rep_password'] ;

         // Check Password
         if($pass != $rep_pass){
            echo "Password not much";
         }
        // Check email
        $check_email = mysqli_query($connect, "SELECT email FROM users where email = '$email' ");
        if(mysqli_num_rows($check_email) > 0){
            echo('Email Already exists');
        }
         
    else{
        $query= "INSERT INTO  users(full_name , email, password , phone , gender , img,admin_id)
        VALUES
        ('$full_name' , '$email' , '$pass' , '$phone' ,'$gender','../img/user.png',1)";
        if($result=mysqli_query($connect,$query))
        {
            $sql = "SELECT id from users where email = '$email'";
                    $result = mysqli_query($connect, $sql); 
                    $row = mysqli_fetch_array($result);
                    $user_id =  $row['id'];
                    $_SESSION['user_id']=$user_id;    
                    $_SESSION['loggedIn']=true;
                    $_SESSION['full_name'] = $full_name;
                    header("location:user_dashbord.php");
        }
        else{
            echo "thats problem is select $query.".mysqli_error($connect)."<br>";
        }
           
 
        }
    }
    
     ?>

    
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>