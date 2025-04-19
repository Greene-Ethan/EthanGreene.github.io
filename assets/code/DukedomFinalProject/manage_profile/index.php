<?php
session_start();
require('../model/database.php');
require('../model/database_oo.php');
require('../model/user_db.php');
require('../model/userBuy_db.php');

$action = filter_input(INPUT_POST, 'action');
switch($action){
       
    case"update_profile": 
        $first_name = filter_input(INPUT_POST, 'firstName'); 
        $last_name = filter_input(INPUT_POST, 'lastName'); 
        $address = filter_input(INPUT_POST, 'address'); 
        $city = filter_input(INPUT_POST, 'city'); 
        $state = filter_input(INPUT_POST, 'state'); 
        $postal = filter_input(INPUT_POST, 'postalCode'); 
        $country = filter_input(INPUT_POST, 'countries');
        $phone = filter_input(INPUT_POST, 'phone'); 
        $email = filter_input(INPUT_POST, 'email'); 
        $username = $_SESSION["user"];
        if(!($username == false ||$first_name == false || $last_name == false || $address == false || $city == false || $state == false || $postal == false || $country == false || $phone == false || $email == false || $password == false)){
            update_user($username, $first_name, $last_name, $address, $city, $state, $postal, $country, $phone, $email);
            $_SESSION["user"] = $username;
            $_SESSION["first"] = $first_name;
            $_SESSION["last"] = $last_name;
            $_SESSION["address"] = $address;
            $_SESSION["city"] = $city; 
            $_SESSION["state"] = $state; 
            $_SESSION["postal"] = $postal; 
            $_SESSION["country"] = $country; 
            $_SESSION["phone"] = $phone; 
            $_SESSION["email"] = $email;
            include('./unverified_profile.php');
        }
        else {
            $error = "You left a field blank, please go back and recheck entries.";
            include('../manage_register/user_register_fail.php');
        }
        break;
    
    case"list_update_profile":
        include("./user_update.php");
        break;
        
    default:
        if(!$_SESSION["loggedIn"]){ include("../needToLogin.php"); }
        else if($_SESSION["verified"]){ include("./list_profile.php"); }
        else{ include("./unverified_profile.php"); }
        break;
}






/*
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_user_login';
    }
}
if ($action == 'show_user_login' && $user == null) {
    include('user_login_final.php');
} else if($user != null){
    include("./customer_login_granted.php");
} else if ($action == 'find_user_login') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $user = get_user($username, $password);
    if ($user == false){
        $error = "Invalid login. Try again.";
        include('../errors/error.php');
    } 
    else{
        include("./user_login_success.php");
    }
}
            
        
        //register_product($custy,$product_id, $result);
        //include('customer_login_registered.php');
 * 
 */
?>

