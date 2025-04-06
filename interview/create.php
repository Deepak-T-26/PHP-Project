<?php
include ('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Id = $_POST['Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Use prepared statements to prevent SQL injection and ensure proper formatting
    $query = $con->prepare("INSERT INTO crudoperation (Id, Name, Email, Address) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $Id, $name, $email, $address); // Use 'ssss' because we have 4 string parameters

    if ($query->execute()) {
        echo "<script>alert('Created Successfully');window.location='view.php';</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Page</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="bg-white w-25 rounded p-3">
            <h2>Fill Form</h2>
            <form action="" method="POST">
                <div class="mb-2">
                    <input type="text" name="Id" class="form-control" placeholder="Enter Id" required>
                </div>
                <div class="mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="mb-2">
                    <input type="text" name="address" class="form-control"  placeholder="Enter address" required>
                </div>
                <button class="btn btn-success w-100" type="submit">Create</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
