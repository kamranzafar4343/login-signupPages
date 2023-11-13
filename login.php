<!-- In the login page we check if user exist in database we then log in 
and user automatically moved to welcome page. 
If not exist then show error that user not exist -->

<?php

$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    //just see where username and password both matches
    $sql= "select * from `registration` where username ='$username' and password ='$password'";
    $result= mysqli_query($con, $sql);


    // checks that the user exist in the database or not
    // if exist then shows success message on top

    if($result){
        $num= mysqli_num_rows($result);
        if($num>0){
           $login= 1;
           

           session_start();
           $_SESSION['username']= $username;
           header('location: home.php');
 
        }

    // if not exist then it shows error
        else{
          $invalid= 1;
          
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
    
<?php
    
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success </strong> User Logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

      
   
     if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Invalid </strong> User does not exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
       
    }

    ?>





  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <div class="container mt-5">
        <form action="login.php" method="post">
            <h1 class="mb-5">login page</h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">

            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">login</button>
            <div class="container mt-5">
            <p class="mt-6">If you don't have an account click create account.</p>
            <a href="sign.php" class="btn btn-primary w-20 ">Create account</a>
            </div>  
        </form>
    </div>

</body>

</html>