<?php
include ("./database/connection.php");
?>

<?php
$sql = "SELECT * FROM users";
$result = $connection->query($sql);

$usersCount = $result->num_rows;
$postsCount = $result->num_rows;
$categorysCount = $result->num_rows;

?>

<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="card text-white text-bg-primary">
            <div class="card-header">Users</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $usersCount; ?></h5>
                <a href="#" class="text-decoration-none">View Users</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="card text-white text-bg-secondary">
            <div class="card-header">Posts</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $postsCount; ?></h5>
            </div>
            <a href="#" class="text-decoration-none">
                <div class="card-footer">View Posts</div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="card text-white text-bg-danger">
            <div class="card-header">Categorys</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $categorysCount; ?></h5>
                <a href="#" class="text-decoration-none">View Categorys</a>
            </div>
        </div>
    </div>
</div>