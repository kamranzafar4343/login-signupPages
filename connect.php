<?php
$HOSTNAME= 'localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupforms';

$con= mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if($con){
    echo "Database Connection successfull";
}
else{
    echo"error during connection";
}

?>