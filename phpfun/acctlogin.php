<?php
  
  $login_status = '';

  if(isset($_POST['login'])){

    $groupcode = $company;
    $username = htmlspecialchars($_POST['username']);
    $password = sha1($_POST['password']);

    // Prepared statements
    $stmt=mysqli_stmt_init($conn);

    $sql = "SELECT * FROM users 
        WHERE username = ?
        AND password = ?
        AND groupcode = ?
        ";

    if(mysqli_stmt_prepare($stmt,$sql)){
      mysqli_stmt_bind_param($stmt,'sss',$username,$password,$groupcode);
      mysqli_stmt_execute($stmt);

      mysqli_stmt_store_result($stmt);
      
      if(mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt,$id,$groupcode,$username,$password,$role);
        while(mysqli_stmt_fetch($stmt)) {
          
          $_SESSION['userid'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['groupcode'] = $groupcode;
          $_SESSION['role'] = $role;

          header('location:menu.php', true, 301);
        }
      } else {
        echo '<script type="text/javascript"> 
                var status="login_error";
                document.getElementById("#login_modal").showModal();
              </script>';
        $login_status = 'login_error';
      }

      mysqli_stmt_close($stmt);
    }

    // $sql = "SELECT * FROM users 
    //   WHERE username = '$username'
    //     AND password = '$password'
    //     AND groupcode = '$groupcode'
    //   ";

    // $result = mysqli_query($conn,$sql);

    // if(mysqli_num_rows($result) > 0) {
    //   while($row = mysqli_fetch_assoc($result)) {
        
    //     extract($row);

    //     $_SESSION['userid'] = $id;
    //     $_SESSION['username'] = $username;
    //     $_SESSION['groupcode'] = $groupcode;
    //     $_SESSION['role'] = $role;

    //     header('location:menu.php', true, 301);
    //     }
    // } else {
    //   echo '<script type="text/javascript"> 
    //           var status="login_error";
    //           document.getElementById("#login_modal").showModal();
    //         </script>';
    //   $login_status = 'login_error';
    // }
  }
?>