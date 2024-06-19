<?php

if (isset($_POST['logout'])) {
  session_unset(); // Unset all of the session variables
  session_destroy(); // Destroy the session
  header("Location: login"); // Redirect to the login page
  exit();
}


?>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <svg class="bi me-2" width="40" height="32">
      <use xlink:href="#bootstrap"></use>
    </svg>
    <span class="fs-4">Blog</span>
  </a>

  <ul class="nav nav-pills">
    <li class="nav-item"><a href="/blog/login" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="/blog/register" class="nav-link">Register</a></li>
    <li class="nav-item"><a href="/blog/post" class="nav-link">post</a></li>
    <li class="nav-item"><a href="/blog/posts" class="nav-link">posts</a></li>
    <li class="nav-item"><a href="/blog/category" class="nav-link">category</a></li>
    <li class="nav-item"><a href="/blog/contact" class="nav-link">contact</a></li>
    <?php if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == true) { ?>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="logout" value="true">
        <li class="nav-item"><button type="submit" class="nav-link">logout</button></li>
      </form>
    <?php } ?>
  </ul>
</header>