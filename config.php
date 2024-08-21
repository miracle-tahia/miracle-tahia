<?php
    $server_name = 'localhost';
    $username ='root';
    $password = '';
    $databasename = 'ak';

    $connection = mysqli_connect($server_name, $username, $password, $databasename);

    if($connection){
        echo 'connection successful';
    }
    else{
        echo 'connection refused';
    }


    

    
?>