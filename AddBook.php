<?php
    require('top.php');
    require('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddBook</title>
    <style>
        .input{
            width:98%;
            height:35px;
            border-radius:10px;
            padding-left:5px;
            font-size:15px;
            border: 2px solid black;
        }
        .button{
            width:70%;
            height:50px;
            background: #000000;
            color:white;
            font-size:20px;
            text-align: center;
            padding: 5px 10px;
            border-radius:50px;
        }
        .button:hover{
            color: #000000;
            background: white;
            padding: 3px 8px;
            border: 2px solid #25041d;
        }
    </style>
</head>
<body>
    <form action="" style="margin-top:20px;margin-bottom:20px;">
        <div align="Center">
            <table cellpadding=10 cellspacing=10 border=5 width=70% >
                <tr>
                    <th><h1>Add Book Details</h1></th>
                </tr>
                <tr>
                    <td align="center"><input type="text" name="title" placeholder="Title" class="input" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="text" name="author" placeholder="Author" class="input" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="number" name="price" placeholder="Price" class="input" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="number" name="nocpy" placeholder="No of Copy" class="input" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" value="Add" name="add" class="button"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
<?php
    if(isset($_REQUEST['add'])){
        $title=$_REQUEST['title'];
        $author=$_REQUEST['author'];
        $price=$_REQUEST['price'];
        $nocpy=$_REQUEST['nocpy'];
        require('connect.php');
        $q="insert into book values(null,'$title','$author','$price','$nocpy')";
        //echo $q;

        if(mysqli_query($mysql,$q)){
            header('location:ManageBook.php');
        }
        else
            die('Insertion Failed..'.mysqli_error($mysql));
    }
    require('footer.php');
?>