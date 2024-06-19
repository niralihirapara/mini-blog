<?php

if (isset($_POST['name']) && isset($_POST['email'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO contacts (name, email) VALUES ('$name', '$email')";

    $result = $connection->query($sql);

    if ($result) {
        $_SESSION['flash_message'] = 'New record created successfully.';
    } else {
        $_SESSION['error_message'] = 'Some error occured, please try again.';
    }
}

$query = $connection->query("SELECT name, email FROM contacts");


// Fetch all categories as an associative array
$contacts = $query->fetch_all(MYSQLI_ASSOC);

?>


<table class="table table-hover">
    <div class="table responsive">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $index => $contact): ?>

                <tr>
                    <td scope="row"> <?= $index + 1 ?> </td>
                    <td> <?= $contact['name'] ?> </td>
                    <td> <?= $contact['email'] ?> </td>
                    <td><button type="button" class="btn btn-primary btn-sm">View</button></td>
                </tr>


            <?php endforeach; ?>

        </tbody>
    </div>
</table>