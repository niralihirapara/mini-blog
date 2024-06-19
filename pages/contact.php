<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['description'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO contacts (name, email, description, created_at, updated_at) VALUES ('$name', '$email', '$description', '$created', '$created')";

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
            <h1 class="h3 mb-3 fw-normal">Contact Us</h1>

            <?php if (isset($_SESSION['flash_message'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['flash_message']; ?>
                </div>
            <?php } ?>

            <div class="form-floating my-3">
                <input type="name" class="form-control" name="name" placeholder="Youe Name">
                <label for="floatingInput">Name</label>
            </div>

            <div class="form-floating my-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>

            <div data-mdb-input-init class="form-outline">
                <textarea class="form-control" id="textAreaExample1" rows="8" name="description"
                    placeholder="Description"></textarea>
                <label class="form-label" for="textAreaExample"></label>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-primary w-50 py-1" type="send" value="send">Send</button>
            </div>
        </form>
    </div>
</div>