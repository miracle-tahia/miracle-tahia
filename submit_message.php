<?php
include('config.php');
if (isset ($_POST['submit_message'])){
    $name = $_POST['name'];
    $email =$_POST['email'];
    $subject =$_POST['subject'];
    $message =$_POST['message'];

    $sql_query = mysqli_query($connection, "INSERT INTO messages(name,email,subject,message)VALUES('$name', '$email', '$subject', '$message')");
    if( $sql_query ){
        echo 'Thank you for contacting us'; 
        header('Location: ./');
    }else{
        echo 'Error sending message';
    }
}else{
    header('Location: ./');
}
?>