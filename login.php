<?php

$user=0;
$success=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql= "select * from `registration` where username ='$username'";
    $result= mysqli_query($con, $sql);


    // checks that the user exist in the database or not 
    if($result){
        $num= mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }

    // if not exist then it insert user data into database only
        else{
            $sql = "insert into `registration` (username, password) values('$username', '$password')";


            $result = mysqli_query($con, $sql);

            if($result){
                $success=1;
            }
             else{
                echo"error while inserting data";
             }
        }

        
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>
    
  <!-- if user exist then it will show error message; like in stylish bootstrap -->




  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <h1 class="mb-5">login page</h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">

            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="enter Password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">login</button>
        </form>
    </div>

</body>

</html>