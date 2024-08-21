<?php
include('config.php');
if(isset ($_POST['login'])){
$email =$_POST['email'];
$password =md5($_POST['password']);

// Check if account already exists
$fetch_query = mysqli_query($connection, "SELECT COUNT(*) AS total FROM accounts WHERE email ='$email'");

$results = mysqli_fetch_assoc($fetch_query);

 if($results['total'] > 0){
    $check_pass_query = mysqli_query($connection, "SELECT * FROM accounts WHERE email='$email' AND password='$password'");
 
    $num_rows = $check_pass_query->num_rows;

    if($num_rows > 0){
        echo 'Successfully logged in';
        while($row = mysqli_fetch_assoc($check_pass_query)){
            
            session_start();

            $_SESSION['name'] = $name = $row['name'];
            $_SESSION['email'] = $email = $row['email'];

        }
        header('Location: ./');

    }else{ ?>
        <script>
            alert('Wrong credentials');
        </script>
    <?php
        header('Location: ./login.php');
    
}
    echo'Account exists';
 }else{
    echo'Account does not exist, please register';
 }
}
?>