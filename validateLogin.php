<?php

include("config.php");
$usersID = 0;
$email = $_POST['email2'];

$sql = "SELECT * FROM users WHERE email = '".$email."'";

$result = $db->query($sql);

$assoc = $result->fetch_assoc();

if($assoc == null) {
    $status = 'error';
    $message = 'There is no account associated with that email address.';
}
else {
    $password = $_POST['password'];
    $randomKey = '1337.69420$#(#@#@$J$Deofimcubnj';
    $encryptedPassword = md5(base64_encode($password.$randomKey));

    if($assoc['password'] == $encryptedPassword) {
        $status = 'success';
        $message = 'Successfully logged in';
        $username = $assoc['username'];
        $sqlID =  "SELECT user_id FROM users WHERE email = $email";
        $result = $db->query($sql);
        $assoc3 = $result->fetch_assoc();
        $usersID = $assoc3['user_id'];


    }
    else
    {
        $status = 'error';
        $message = 'The password you entered is invaid.';
    }

}

$data = array(
    'status' => $status,
    'message' => $message,
    'username' => $username,
    'user_id' => $usersID
);

echo(json_encode($data));

?>