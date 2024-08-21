<?php
include('config.php');
if(isset ($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);

    // Check if account already exists
    $fetch_query = mysqli_query($connection, "SELECT COUNT(*) AS total FROM accounts WHERE email = '$email'");

    $results = mysqli_fetch_assoc($fetch_query);

    if($results['total'] == 0){
        $sql_query = mysqli_query($connection,"INSERT INTO accounts(name,email,gender,password)VALUES('$name','$email','$gender','$password')");

        if($sql_query){
            echo'Thank you for registering with us';
            header('Location: ./login.php');
        }else{
            echo'Error registering';
        }
    }else{
        echo 'Account already exists';
    }
    

    
}else{
    header('Location: ./');
}
?>