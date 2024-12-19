<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM profile WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location:index.php?msg=Data Deleted Successfully');
} else {
    echo "Error;" . $sql . "<br/>" . mysqli_connect_error($conn);
}



?>