<?php
$host="127.0.0.1";
$password="";
$usfer="root";
$database="mng_expense";
  $connect=mysqli_connect($host,$usfer,$password,$database);
    if(mysqli_connect_errno())
    {
        die ("filed connection").mysqli_connect_error();
    }

?>