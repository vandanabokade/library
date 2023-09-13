<?php
    require('top.php');
    require('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book</title>
</head>
<body>
<caption><h3 align="center" style="margin-top:20px;margin-bottom:20px;">Manage Books</h3></caption>
    <center style="margin-top:20px;margin-bottom:20px;"><b><a href="AddBook.php">Add Book</a></b><br><br>
</body>
</html>
<?php   
    require('connect.php');
    $q="select * from book";
    $result=mysqli_query($mysql,$q) or die("Error..".mysqli_error($mysql));
    if(mysqli_num_rows($result)>0){
        echo "<table cellspacing=10 cellpadding=10 border=5 style='margin-bottom:20px;'>";
        echo "<tr><th>Edit</th>";
        echo "<th>Delete</th>";
        echo "<th>Book_Id</th>";
        echo "<th>Title</th>";
        echo "<th>Author</th>";
        echo "<th>Price</th>";
        echo "<th>No of Copy</th></tr>";
        while($r=mysqli_fetch_array($result)){
            echo "<tr align='center'>";
            echo "<td><a href='edit.php?bid=$r[0]'><img src='edit.png' height='30px' width='30px'></a></td>";
            echo "<td ><a href='delete.php?bid=$r[0]'><img src='delete.png' height='30px' width='30px'></a></td>";
            echo "<td>$r[0]</td>";
            echo "<td>$r[1]</td>";
            echo "<td>$r[2]</td>";
            echo "<td>$r[3]</td>";
            echo "<td>$r[4]</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        die("Book doesn't exists...".mysqli_error($mysql));
    }
    require('footer.php');
?>
</center>