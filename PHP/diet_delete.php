<?php
include_once 'conn.php';

if (isset($_GET['doc_id'])) {
    $doc_id = $_GET['doc_id'];

    $query = "DELETE FROM `dietician` WHERE `doc_id` = '$doc_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "Record deleted successfully.";
        echo $message;
    } else {
        $message = "Error deleting record: " . mysqli_error($conn);
    }
} else {
    $message = "Invalid department number.";
}
?>