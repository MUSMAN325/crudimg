<?php
include 'config.php';
echo $ID = $_GET['Id'];
mysqli_query($Con,"Delete from tblcrud where Id= $ID");
 header("location:imageupload.php");
?>