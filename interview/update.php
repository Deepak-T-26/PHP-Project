<?php
include('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure ID is available
    if (isset($_GET['Id'])) {
        $Id = $_GET['Id']; // Get the ID from URL
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Use prepared statement to prevent SQL Injection
        $query = $con->prepare ("UPDATE crudoperation SET Name=?, Email=?, Address=? WHERE id=?");
        $query->bind_param("sssi", $name, $email, $address, $Id); // 'i' for integer ID
        
        if ($query->execute()) {
            echo "<script>alert('Updated Successfully'); window.location='view.php';</script>";
        } else {
            echo "<script>alert('Error: " . $query->error . "');</script>";
        }
    } else {
        echo "<script>alert('Invalid request.'); window.location='view.php';</script>";
    }
}

// Fetch existing data for the form
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $query = mysqli_query($con, "SELECT * FROM crudoperation WHERE Id='$Id'");
    $row = mysqli_fetch_assoc($query); // Fetch single record

    // Check if data was found
    if (!$row) {
        echo "<script>alert('No record found with that ID.'); window.location='view.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No ID provided.'); window.location='view.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Page</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="bg-white w-25 rounded p-3">
            <h2 class="text-center">Update Record</h2>
            <form action="" method="POST">
            <div class="mb-2">
                    <input type="text" name="Id" value="<?php echo htmlspecialchars($row['Id']) ? $row['Id'] : ''; ?>" class="form-control" placeholder="Enter Id" required>
                </div>
                <div class="mb-2">
                    <input type="text" name="name" value="<?php echo htmlspecialchars($row['Name']); ?>" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="mb-2">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($row['Email']); ?>" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="mb-2">
                    <input type="text" name="address" value="<?php echo htmlspecialchars($row['Address']); ?>" class="form-control" placeholder="Enter address" required>
                </div>
                <button class="btn btn-success w-100" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
