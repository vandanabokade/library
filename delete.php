<?php
if(isset($_REQUEST['bid'])){
    $bid=$_REQUEST['bid'];
    require('connect.php');
    $q="delete from book where bid='$bid'";
    if(mysqli_query($mysql,$q)){
        header('location:ManageBook.php');
    }
    else
        die('Deletion Failed..'.mysqli_error($mysql));
}
?>