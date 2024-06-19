<?php

if (isset($_POST['title'])) {

    $title = $_POST['title'];
    $created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO categorys (title, created_at, updated_at) VALUES ('$title', '$created', '$created')";

    $result = $connection->query($sql);

    if ($result) {
        $_SESSION['flash_message'] = 'New record created successfully.';
    } else {
        $_SESSION['error_message'] = 'Some error occured, please try again.';
    }
}
?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <h1 class="h3 mb-3 fw-normal">CATEGORY PAGE</h1>

            <?php if (isset($_SESSION['flash_message'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['flash_message']; ?>
                </div>
            <?php } ?>

            <div class="form-floating my-3">
                <input type="title" class="form-control" name="title">
                <label for="floatingInput">Title</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>