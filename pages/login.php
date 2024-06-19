<?php

if (isset($_POST['email']) && isset($_POST['password'])) {

   $email = $_POST['email'];
   $sql = "SELECT * FROM users WHERE email = '$email'";
   $result = $connection->query($sql);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      $dbPassword = $row["password"];

      $hashedPass = md5($_POST['password']);

      if ($dbPassword != $hashedPass) {
         $_SESSION['error_message'] = "Wrong email or password";
      } else {
         $_SESSION["user"] = $row;
         $_SESSION["is_logged_in"] = true;
         $_SESSION['flash_message'] = "You are logged in! {$row['name']}";
      }

   } else {
      $_SESSION['error_message'] = "Record does not exist in system";
   }
}

?>


<div class="row">
   <div class="col-md-6 mx-auto">
      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
         <h1 class="h3 mb-3 fw-normal">Sign in</h1>

         <?php if (isset($_SESSION['flash_message'])) { ?>
            <div class="alert alert-success" role="alert">
               <?php echo $_SESSION['flash_message']; ?>
            </div>
         <?php } ?>

         <?php if (isset($_SESSION['error_message'])) { ?>
            <div class="alert alert-danger" role="alert">
               <?php echo $_SESSION['error_message']; ?>
            </div>
         <?php } ?>

         <div class="form-floating my-3">
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
         </div>
         <div class="form-floating my-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
         </div>
         <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      </form>
   </div>
</div>