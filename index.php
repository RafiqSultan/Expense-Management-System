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
            <p>Password</p> <input type="password" name="password" placeholder="Enter Password" required>
             <input type="submit" name="submit" value="Login"> <a href="#">Lost your password?</a><br>
          <a href="php/register.php">Don't have an account?</a>
        </form>
    </div>
    <?php
session_start();
if(isset($_POST['submit']))
{
 $email =($_POST['email']);
 $password =($_POST['password']);

include("database/connect.php");


$sql="SELECT * FROM users  WHERE email='$email' AND password='$Password'";
 $sqli_reuslt=mysqli_query($connect,$sql) or die('Sql Not Execution');

 $sqli_reuslt_array=mysqli_fetch_assoc($sqli_reuslt);
 $id =$sqli_reuslt_array ['id'];
 $_SESSION['logged'] = 'yes';
 $_SESSION['full_name'] = $full_name;
 $_SESSION['user_id'] = $id;
}
 else {
    echo "erorr in  username or password !";
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>