
<?php
include('../database/connect.php');

if(isset($_POST['delete_data'])){

  $member_id = $_POST['deleteMid'];
  $memberG_id = $_POST['deleteMGid'];

$count_group=0;
  $query ="SELECT count(user_id) as count from user_group WHERE user_id=$member_id";
  $res = $connect->query($query);
  if($res->num_rows> 0){
      $ty=$res->fetch_assoc();
     $count_group=$ty['count'];
  }

 
  if($count_group == 1){
          $quer = "DELETE FROM user_group WHERE user_id=$member_id and group_id=$memberG_id";

            $query_run = mysqli_query($connect, $quer);

            if($query_run)
            {
              $qu ="UPDATE users SET type='user' WHERE id=$member_id";
              $re = $connect->query($qu);


              echo '
              <script>
             
              window.location.href="http://localhost/exp/php/show_all_member.php";
              </script>
              ';
            }
            else
            {
                echo '<script> alert("Data Not Deleted"); </script>';
            }

  }
  else{
          $quer = "DELETE FROM user_group WHERE user_id=$member_id and group_id=$memberG_id";

          $query_run = mysqli_query($connect, $quer);

          if($query_run)
          {
    
            echo '
            <script>
          
            window.location.href="http://localhost/exp/php/show_all_member.php";
            </script>
            ';
          }
          else
          {
              echo '<script> alert("Data Not Deleted"); </script>';
          }
  }



 
}

?>