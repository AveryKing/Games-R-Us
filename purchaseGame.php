<?php

define("SECRET_1", "49m@#(#jsm#(ndk'nJ#*S039duidDjnf39jFKEK#nhjsos8#*@");
define("SECRET_2", "320348jfdnJD*#28383jMSKSKNduduh83jj3edkddkdjw*@#(ejdud");

function getBalance($userId) {
    include('config.php');
    $sql = "SELECT credits FROM users WHERE user_id = '".$userId."'";
    $result = $db->query($sql);
    $assoc = $result->fetch_assoc();

    return $assoc['credits'];
}

function generateSecurityHash($userId) {
    $secretKey1 = "49m@#(#jsm#(ndk'nJ#*S039duidDjnf39jFKEK#nhjsos8#*@";
    $secretKey2 = "320348jfdnJD*#28383jMSKSKNduduh83jj3edkddkdjw*@#(ejdud";
    $md5 = md5(base64_encode($secretKey1.$userId.$secretKey2));
    
    return $md5;
}

function getItemPrice($itemId) {
    include('config.php');
    $sql = "SELECT price FROM items WHERE item_id = $itemId";
    $result = $db->query($sql);
    $assoc = $result->fetch_assoc();
    $price = $assoc['price'];
    $price2 = str_replace("$", "", $price);
    $price_credits = round($price2);
    return $price_credits;
}

function getItemPriceUSD($itemId) {
    include('config.php');
    $sql = "SELECT price FROM items WHERE item_id = $itemId";
    $result = $db->query($sql);
    $assoc = $result->fetch_assoc();
    $price = $assoc['price'];
    return $price;
}

function getItemName($itemId) {
    include('config.php');
    $sql = "SELECT * FROM items WHERE item_id = $itemId";
    $result = $db->query($sql);
    $assoc = $result->fetch_assoc();

    return $assoc['name'];
}

function checkIfOwned($userId, $itemId) {
    include('config.php');
    $sql = "SELECT library FROM users WHERE user_id = $userId";
    $result = $db->query($sql);
    $assoc = $result->fetch_assoc();

    if($assoc['library'] == "none") {
        return false;
    }
    else
    {
        $itemsArray = explode(',', $assoc['library']);
        if(in_array($itemId, $itemsArray)) {
            return true;
        }
        else
        {
            return false;
        }
    }
}

function insertToInventory($userId, $itemId) {
    include('config.php');

    if(checkIfOwned($userId,$itemId)) {
        return "alreadyOwned";
    }

    if(getItemPrice($itemId) > getBalance($userId)) {
        return "insufficientFunds";
    }
    $existsResult = $db->query("SELECT * FROM items WHERE item_id = $itemId");

    if($existsResult->num_rows > 0) {
    $sql = "SELECT library FROM users WHERE user_id = $userId";
    $result = $db->query($sql);
    $assoc = $result->fetch_assoc();
    $currentLibrary = $assoc['library'];

    switch($currentLibrary) {
        case "none":
            $updateQuery = "UPDATE users SET library = $itemId WHERE user_id = $userId";
            $db->query($updateQuery);
            return "success";
            break;
        default:
            $newLibrary = $currentLibrary.','.$itemId;
            $updateQuery = "UPDATE users SET library =  '$newLibrary' WHERE user_id = $userId";
            $db->query($updateQuery);
            return "success";
            break;
            }
        }
    else
        {
            return "failure";
        }
       
}

function updateBalance($userId, $itemId) {
    include('config.php');
    $currentBalance = getBalance($userId);
    $itemPrice = getItemPrice($itemId);

    $newBalance = $currentBalance - $itemPrice;
    $db->query("UPDATE users SET credits = $newBalance WHERE user_id = $userId");
}

function doPurchase($userId, $itemId) {
    include('config.php');
    $correctSecurityHash = generateSecurityHash($userId);
    $givenSecurityHash = $_GET['ush'];
   
    switch($givenSecurityHash == $correctSecurityHash) {
        case true:
            $currentBalance = getBalance($userId);
            $itemPrice = getItemPrice($itemId); 
                switch(insertToInventory($userId, $itemId)) {
                    case "success":
                        $response = "success";
                        updateBalance($userId, $itemId);
                        break;
                    case "failure":
                        $response = "nonExistentItem";
                        break;
                    case "insufficientFunds":
                        $response = "insufficientFunds";
                        break;
                    case "alreadyOwned":
                        $response = "alreadyOwned";
                        break;
                }
                break;
           
        case false:
            $response = "securityError";
            break;
    }

    return $response;
}
/*

if(isset($_COOKIE['loggedIn'])) {
    if($_COOKIE['loggedIn'] == 1) {*/

        if(isset($_GET['cmd'])) {
            switch($_GET['cmd']) {
                case "doPurchase":
                    $itemId = $_GET['itemId'];
                    $userId = $_COOKIE['userId'];
                    $itemName = getItemName($itemId);
                    switch(doPurchase($userId, $itemId)) {
                        case "success":
                            $array = array("response"=>"success", "data"=>"You have successfully purchased $itemName");
                            echo(json_encode($array));
                            break;
                        case "insufficientFunds":
                            $array = array("response"=>"failure", "data"=>"You do not have sufficient funds to make this purchase. Please add credits to your account.");
                            echo(json_encode($array));
                            break;
                        case "securityError":
                            $array = array("response"=>"failure", "data"=>"User authentication error");
                            echo(json_encode($array));
                            break;
                        case "alreadyOwned":
                            $array = array("response"=>"failure", "data"=>"You are attempting to purchase a game that you already own ($itemName)");
                            echo(json_encode($array));
                            break;
                        case "nonExistentItem":
                            $array = array("response"=>"failure", "data"=>"You are attempting to purchase an item that does not exist.");
                            echo(json_encode($array));
                            break;
                    }
                    break;
                case "gsh":
                    if(isset($_COOKIE['userId'])) {
                        $gsh = generateSecurityHash($_COOKIE['userId']);
                        echo($gsh);
                    }
                    break;
                case "checkLoggedIn":
                    if(isset($_COOKIE['loggedIn']))
                    {
                        if($_COOKIE['loggedIn'] == 1) {
                            echo("true");
                        }
                    
                        if($_COOKIE['loggedIn'] == 0) {
                            echo("false");
                        }
                    }
                    break;
                case "getUser":
                    if(isset($_COOKIE['userId'])) {
                        echo($_COOKIE['userId']);
                    }
                    break;
                case "confirmBuy":
                  
                    include('config.php');
                    $userId = $_POST['u'];
                    $sql = "SELECT * FROM users WHERE user_id = $userId";

                    $result = $db->query($sql);

                    $assoc = $result->fetch_assoc();

                    $password = $_POST['password'];
                    $randomKey = '1337.69420$#(#@#@$J$Deofimcubnj';
                    $encryptedPassword = md5(base64_encode($password.$randomKey));

                    if($assoc['password'] == $encryptedPassword) {

                     echo("valid");
                
                
                    }
                    else
                    {
                       echo("invalid");
                    }
                    break;
                case "getName":
                    echo(getItemName($_GET['itemId']));
                    break;
                case "getPrice":
                    echo(getItemPriceUSD($_GET['itemId']));
                    break;
                case "gamesList":
                    include('config.php');
                    $userId = $_GET['userId'];
                    $sql = "SELECT library FROM users WHERE user_id = $userId";
                    $result = $db->query($sql);
                    $assoc = $result->fetch_assoc();
                    $library = $assoc['library'];
                    if($library == "none") {
                        echo("You have not yet purchased any games.");
                    }
                    else
                    {
                        $var=explode(',',$library);
                        foreach($var as $gid)
                         {
                        $toPrint = "<a class='openGame'> ".getItemName($gid)."</a><br>";
                        echo($toPrint);
                      //   echo(file_get_contents('https://defunctive-coxswain.000webhostapp.com/purchaseGame.php?cmd=getName&itemId='.$row."<br>"));
                         }
                    }
                    break;
                case "modifyCredits":
                    include('config.php');
                    $u = $_POST['u'];
                    $c = $_POST['credits'];

                    $sql = "UPDATE users SET credits = $c WHERE user_id = $u";
                    $db->query($sql);
                    break;
    /*
            }
        }   */
    }
}
else
{
   
    $array = array("response"=>"Not logged in!");
    echo(json_encode($array));
    
}


?>