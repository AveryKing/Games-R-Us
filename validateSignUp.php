<?php

include('config.php');

if($_GET['action'] == 'register') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $randomKey = '1337.69420$#(#@#@$J$Deofimcubnj';
    $encryptedPassword = md5(base64_encode($password.$randomKey));

    $sql = "SELECT * FROM users WHERE email = '".$email."'";
    $result = $db->query($sql);

    $assoc = $result->fetch_assoc();

   

    if($assoc == null) {

        if($_POST['password'] !== $_POST['confirmPassword']) {
            $status = 'error';
            $message = 'The passwords you entered do not match.';
            $usersID = 0;
        }
        else {

        $status = 'success';
        $message = 'You have been signed up!';
        $db->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$encryptedPassword')");
        $sqlID =  "SELECT user_id FROM users WHERE email = $email";
        $result = $db->query($sql);
        $assoc = $result->fetch_assoc();
        $usersID = $assoc['user_id'];

        }
    
    }
 
    else {
        $status = 'error';
        $message = ' There is already an account associated with that email.';
        $usersID = 0;
    }

    $data = array(
        'status' => $status,
        'message' => $message,
        'username' => $username,
        'user_id' => $usersID
    );

    echo(json_encode($data));
}

   
    


