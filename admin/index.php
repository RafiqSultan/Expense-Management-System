<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXpense Managemment System</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    
</head>
</head>
<body>
<section class="home_banner">
    <div class="overly"></div>

    <div class="loginbox">
        <h2>Login</h2>
        <form method="post" action="">
            <p>Email</p> <input type="text" name="email" placeholder="Enter Email" required>
            <p>Password</p> <input type="password" name="pass" placeholder="Enter Password" required>
             <input type="submit" name="submit" value="Login"> <a href="#">Lost your password?</a><br>
      
        </form>
    </div>
    <?php
session_start();
if(isset($_POST['submit']))
{
    $email =($_POST['email']);
    $pass =($_POST['pass']);
   
   include('../database/connect.php');
   
$sql = "SELECT * from admin where email = '$email' and password='$pass'";  
        $result = mysqli_query($connect, $sql); 
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  
       
        if($count == 1){  
           
            $name = $row["full_name"]; 
            
            $_SESSION['admin_name']=$name;
            $_SESSION['loggedIn']=true;
            header("location:admin_dashboard.php");
                }  
        else{  
            echo '
            <div class="fixed-top  alert alert-danger" role="alert" id="alert_notf">
            Error in email or password
           </div>';
        }  
}
?>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
    <script type="text/javascript">
        setTimeout(function () {

            $('#alert_notf').alert('close');
        }, 3000);
    </script>
</body>
</html>