<?php
include_once 'conn.php';

if (isset($_GET['subcat_id'])) {
    $subcat_id = $_GET['subcat_id'];

    $query = "DELETE FROM `subcat` WHERE `subcat_id` = '$subcat_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "Record deleted successfully.";
        echo $message;
    } else {
        $message = "Error deleting record: " . mysqli_error($conn);
    }
} else {
    $message = "Invalid subcat number.";
}
?>