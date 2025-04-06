<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View Page</title>
    <style>
        body {
            background-color: #f4f7fc;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            text-align: center;
            vertical-align: mIddle;
        }
        .btn {
            font-size: 14px;
            padding: 6px 12px;
        }
       
    .btn-info, .btn-danger {
        padding: 10px 15px;
        font-size: 14px;
    }

    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-4 w-75 rounded shadow-lg">
            <h2 class="mb-4 text-center">User Records</h2>
            <a href="create.php" class="btn btn-info mb-3">Add New User +</a>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
include('dbconnection.php');

$fetch = mysqli_query($con, "SELECT * FROM crudoperation");
if (!$fetch) {
    die("Error executing query: " . mysqli_error($con));  // Debugging SQL errors
}

$row = mysqli_num_rows($fetch);

if ($row > 0) {
    while ($r = mysqli_fetch_array($fetch)) {
// Debugging: Check the available keys in the fetched row Uncomment the line below to see the keys of the fetched data var_dump(array_keys($r)); 
 ?>
        <tr>
            <td><?php echo htmlspecialchars($r['Id']); ?></td>
            <td><?php echo htmlspecialchars($r['Name']); ?></td>
            <td><?php echo htmlspecialchars($r['Email']); ?></td>
            <td><?php echo htmlspecialchars($r['Address']); ?></td>
            <td>
                <a href="update.php?Id=<?php echo $r['Id']; ?>" class="btn btn-info btn-sm">Update</a>
                <a href="delete.php?delId=<?php echo $r['Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
}
?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
