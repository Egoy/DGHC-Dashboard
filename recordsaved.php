<?php

    include("includes/connections.php");

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $adr = mysqli_real_escape_string($conn, $_POST['adr']);
    $lmark =mysqli_real_escape_string($conn, $_POST['lmark']);
    $ttype = mysqli_real_escape_string($conn, $_POST['ttype']);

    mysqli_query($conn, "INSERT INTO dghdbtbl (`fname`, `lname`, `adr`, `lmark`, `ttype`) VALUES ('$fname', '$lname', '$adr', '$lmark', '$ttype')");
 
    echo "<script language='javascript'>alert('Customer has been added')</script>";
    echo "<script>window.location.href='record.php';</script>";
?>
