<?php
//if user not logged, can't be able to come to home page
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>
            window.location.href = 'login.php';
        </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home Page</title>
</head>
<body>
    <h1>Hy there this is home page, Welcome  
      <?php echo $_SESSION['username'];  ?> 
</h1>
    
    <div class="container mt-5">
    <a href="logout.php" class="btn btn-primary">Logouts</a>
    </div>
</body>
</html>