<?php
session_start();
require('../model/database.php');
require('../model/database_oo.php');
require('../model/user_db.php');
require('../model/verified_db.php');

$action = filter_input(INPUT_POST, 'action');

if(empty($_SESSION["captcha"])){
    $_SESSION["captcha"] = "AX3YBDR";
}

if (!empty($_SESSION['failed_login'])){
    if ($_SESSION['failed_login'] > 3) {
                if(filter_input(INPUT_POST, 'captcha') == $_SESSION["captcha"]){
                    $_SESSION['failed_login'] = 0;
                    include("./user_login_final.php");
                }
                include('./user_login_fail_timer.php');
                } 
} 
switch($action){
        
    case "find_user_login":
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $user = get_user($username, $password);
        
        if ($user == false ){
            if (empty($_SESSION['failed_login'])) 
                {
                $_SESSION['failed_login'] = 1;
                } 
            else
                {
                    $_SESSION['failed_login']++;
                }
            $error = "Invalid login. Try again.";
            if ($_SESSION['failed_login'] > 3) {
                include('./user_login_fail_timer.php');
                } 
            include('./user_login_fail.php');
        } 
        else{
            $ver = get_verified($username)[0][0];
            if($ver == 1){ $_SESSION["verified"] = true; }
            else{ $_SESSION["verified"] = false; }
            $first = get_first($username)[0][0];
            $_SESSION["user"] = $username;
            $_SESSION["first"] = $first;
            $_SESSION["last"] = get_last($username)[0][0];
            $_SESSION["address"] = get_address($username)[0][0];
            $_SESSION["city"] = get_city($username)[0][0]; 
            $_SESSION["state"] = get_state($username)[0][0]; 
            $_SESSION["postal"] = get_postal($username)[0][0]; 
            $_SESSION["country"] = get_countryUser($username)[0][0]; 
            $_SESSION["phone"] = get_phone($username)[0][0]; 
            $_SESSION["email"] = get_email($username)[0][0]; 
            
            $_SESSION['failed_login'] = 0;
            $_SESSION["loggedIn"] = true;
            include("./user_login_success.php");
        }
        break;
        
    default:
        include("./user_login_final.php");
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

