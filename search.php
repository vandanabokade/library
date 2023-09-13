<?php
    require('connect.php');
    if(isset($_POST['q'])){
        $query=$_POST['q'];
        $q="select * from book where title like '%$query%'";
    $result=mysqli_query($mysql,$q) or die("Error..".mysqli_error($mysql));
    if(mysqli_num_rows($result)>0){
        echo "<table cellspacing=10 cellpadding=10 border=5 >";
        echo "<tr><th>Book_Id</th>";
        echo "<th>Title</th>";
        echo "<th>Author</th>";
        echo "<th>Price</th>";
        echo "<th>No of Copy</th></tr>";
        while($r=mysqli_fetch_array($result)){
            echo "<tr align='center'>";
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
    }
?>