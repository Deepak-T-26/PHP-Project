<?php
include('dbconnection.php');

if (isset($_GET['delId'])) {
    $Id = $_GET['delId'];
    // Use lowercase 'id' here
    $sql = mysqli_query($con, "DELETE FROM crudoperation WHERE Id='$Id'");
    
    if ($sql) {
        echo "<script>alert('Delete Successfully');document.location='view.php'</script>";
    } else {
        echo "<script>alert('There was an error in deletion')</script>";
    }
}
?>
