<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);
   $created = date('Y-m-d H:i:s');

   $result = $connection->query("SELECT * FROM users WHERE email='$email'");


   if ($result->num_rows > 0) {
      $_SESSION['error_message'] = 'Email Already Exist.';
   } else {


      $sql = "INSERT INTO users (name, email, password, created_at, updated_at) VALUES ('$name', '$email', '$password', '$created', '$created')";

      $result = $connection->query($sql);

      if ($result) {
         $_SESSION['flash_message'] = 'New record created successfully.';
      } else {
         $_SESSION['error_message'] = 'Some error occured, please try again.';
      }
   }
}
?>

<div class="row">
   <div class="col-md-6 mx-auto">
      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
         <h1 class="h3 mb-3 fw-normal">New Register</h1>

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
            <input type="name" class="form-control" name="name" placeholder="Enter Your Name">
            <label for="floatingInput">Name</label>
         </div>
         <div class="form-floating my-3">
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
         </div>
         <div class="form-floating my-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
         </div>

         <button class="btn btn-primary w-100 py-2" type="submit" value="submit">Sign in</button>
      </form>
   </div>
</div>