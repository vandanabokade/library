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
    <script src="jquery_min.js"></script>
    <script>
        $(document).ready(function(){
           $("#search").keyup(function(){
            var q=$(this).val();
            if(q.length>=1){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{q:q},
                    success:function(data){
                        $("#search-result").html(data);
                    }
                });
            }
           });
        });
    </script>
</head>
<body>
    <div align="center" style="margin-top:20px;margin-bottom:20px;">
        <h1>Search Book</h1>
    </div>
    <div align="center" style="margin: 20px;">
        <input type="text" name="serach" id="search" placeholder="Enter Book Title">
    </div>
    <div id="search-result" align="center" style="margin: 20px;">

    </div>
</body>
</html>
<?php
    require('footer.php');
?>