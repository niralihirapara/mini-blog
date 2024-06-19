<?php

if (isset($_POST['title']) && isset($_POST['category_id']) && isset($_POST['description'])) {

    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO posts (title, category_id, description, created_at, updated_at) VALUES ('$title', '$category_id', '$description', '$created', '$created')";

    $result = $connection->query($sql);

    if ($result) {
        $_SESSION['flash_message'] = 'New record created successfully.';
    } else {
        $_SESSION['error_message'] = 'Some error occured, please try again.';
    }
}

$query = $connection->query("SELECT id, title FROM categories");


// Fetch all categories as an associative array
$categories = $query->fetch_all(MYSQLI_ASSOC);

?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <h1 class="h3 mb-3 fw-normal">POST PAGE</h1>

            <?php if (isset($_SESSION['flash_message'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['flash_message']; ?>
                </div>
            <?php } ?>

            <div class="form-floating my-3">
                <input type="title" class="form-control" name="title">
                <label for="floatingInput">Title</label>
            </div>

            <select class="form-control" name="category_id">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category['id']) ?>">
                        <?= htmlspecialchars($category['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <div data-mdb-input-init class="form-outline">
                <textarea class="form-control" id="textAreaExample1" rows="8" name="description"
                    placeholder="Description"></textarea>
                <label class="form-label" for="textAreaExample"></label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>