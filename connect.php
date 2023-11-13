<?php
$HOSTNAME= 'localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupforms';

$con= mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$con){
    echo"error during database connection";
}

?>