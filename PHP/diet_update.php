<?php
include_once 'conn.php';

if (count($_POST) > 0) {
    $filename = $_FILES['updatepic']['name'];
    $tempname = $_FILES['updatepic'] ['tmp_name'];
    $folder = "./image/".$filename;
    
    //UPDATE `dietician` SET `Name`='" . $_POST['updateDname'] . "',`ph_no`='" . $_POST['updatePno'] . "',`loc`='" . $_POST['updateLoc'] . "' WHERE `doc_id`='" . $_POST['updateDocId'] . "' 
    mysqli_query($conn, "UPDATE `dietician` SET `Name`='" . $_POST['updateDname'] . "',`ph_no`='" . $_POST['updatePno'] . "',`loc`='" . $_POST['updateLoc'] . "',`file_name`='$filename' WHERE `doc_id`='" . $_POST['updateDocId'] . "'");
    if(move_uploaded_file($tempname,$folder)){
        $message = "Record Modified Successfully";
        echo $message;
    }
    else{
        echo"error:" .mysqli_error($conn);
    }
  
}

?>