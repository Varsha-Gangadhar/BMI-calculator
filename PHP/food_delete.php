<?php
include_once 'conn.php';

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    $query = "DELETE FROM `food` WHERE `food_id` = '$food_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "Record deleted successfully.";
        echo $message;
    } else {
        $message = "Error deleting record: " . mysqli_error($conn);
    }
} else {
    $message = "Invalid foodcat number.";
}
?>