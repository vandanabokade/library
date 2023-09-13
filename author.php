<?php
    require('top.php');
    require('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
    <caption><h3 align="center" style="margin-top:20px;margin-bottom:20px;">Display Book for given author</h3></caption>
    <table  align="center" cellspacing=10 cellpadding=10 border=3 style="margin-bottom:20px;">
        <tr>
            <td align="center" colspan=2>Book Details</td>
        </tr>
        <tr>
            <td>
                <select name="author" id="author">
                    <option selected="Selected" disabled>-----Select Author-----</option>
                    <?php
                        require('connect.php');
                        $qu="select author from book";
                        //echo $qu;
                        $result=mysqli_query($mysql,$qu);
                        while($r=mysqli_fetch_array($result)){
                            echo "<option value=$r[0]>$r[0]</option>";
                        }
                        
                    ?>
                </select>
            </td>
            <td><input type="submit" value="Display" name="submit"></td>
        </tr>
    </table>
    </form>
</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $author=$_REQUEST['author'];
        require('connect.php');
        $q="select * from book where author='$author'";
        $res=mysqli_query($mysql,$q) or die("Error..!!".mysqli_error($mysql));
        if(mysqli_num_rows($res)>0){
            echo "<table>";
            echo "<table cellspacing=10 cellpadding=10 border=5 style='margin-top:20px;margin-bottom:20px;' align='center'>";
            echo "<th>Book_Id</th>";
            echo "<th>Title</th>";
            echo "<th>Author</th>";
            echo "<th>Price</th>";
            echo "<th>No of Copy</th></tr>";
            while($r=mysqli_fetch_array($res)){
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
    require('footer.php');
?>