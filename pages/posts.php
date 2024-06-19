<?php

if (isset($_POST['title']) && isset($_POST['description'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO posts (title, description) VALUES ('$title', '$description')";

    $result = $connection->query($sql);

    if ($result) {
        $_SESSION['flash_message'] = 'New record created successfully.';
    } else {
        $_SESSION['error_message'] = 'Some error occured, please try again.';
    }
}

$query = $connection->query("SELECT title, description FROM posts");


// Fetch all categories as an associative array
$posts = $query->fetch_all(MYSQLI_ASSOC);

?>


<div class="list-group">

    <?php foreach ($posts as $post): ?>
        <a href="#" class="list-group-item list-group-item-action">
            <div class="w-100 justify-content-between">

                <h5>
                    <?= $post['title'] ?>
                </h5>
                <p><?= htmlspecialchars($post['description']) ?></p>
                <small class="text-body-secondary">3 days ago</small>
                </option>

            </div>
        </a>
    <?php endforeach; ?>
</div>