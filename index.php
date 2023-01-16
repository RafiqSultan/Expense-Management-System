<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXpense Managemment System</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    
</head>
</head>
<body>
    <h2 class="title">Expense Management System</h2>
    <div class="loginbox">
        <h2>Login</h2>
        <form method="post" action="">
            <p>Email</p> <input type="text" name="email" placeholder="Enter Email" required>
            <p>Password</p> <input type="password" name="pass" placeholder="Enter Password" required>
             <input type="submit" name="submit" value="Login"> <a href="#">Lost your password?</a><br>
          <a href="php/register.php">Don't have an account?</a>
        </form>
    </div>
    <?php
session_start();
if(isset($_POST['submit']))
{
    $email =($_POST['email']);
    $pass =($_POST['pass']);
   
   include('database/connect.php');
   
//    $sql_query = "SELECT * FROM users  WHERE email='$email' and password='$password'";
//    $result = mysqli_query($connect, $sql_query);
  
//    if(mysqli_num_rows($result) > 0 ){
   
//    $row = mysqli_fetch_assoc($result);
//    echo $row;
//    $name = $row["full_name"]; 
//    $user_id =  $row['id'];
//    echo $user_id;
//    echo $name;
//    header("location:php/user_dashbord.php");
   
//    }
//    else{
//     echo "errrrrrrrrrro";
//    }
$sql = "SELECT * from users where email = '$email' and password='$pass'";
echo $sql;  
        $result = mysqli_query($connect, $sql); 
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  
       
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";
            $name = $row["full_name"]; 
            $user_id =  $row['id'];
            $_SESSION['full_name']=$name;
            $_SESSION['user_id']=$user_id;
            header("location:php/user_dashbord.php");
                }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }  
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>