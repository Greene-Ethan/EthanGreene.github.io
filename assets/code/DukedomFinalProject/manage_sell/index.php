<?php
session_start();
require('../model/database.php');
require('../model/database_oo.php');
require('../model/user_db.php');
require('../model/house_db.php');

$action = filter_input(INPUT_POST, 'action');
switch($action){
    
    case"sellHouse":
        $address = filter_input(INPUT_POST, 'address');
        $percent = 100;
        $price = filter_input(INPUT_POST, 'price');
        if(!($address == false ||$price == false)){
        $path = $address;
        $buy_in = ($price / 100);
        addHouse($address, $path, $percent, $price, $buy_in);
        include("./list_sell_sucess.php");
        }
        else{include("./list_sell_error.php"); }
        break;
    
    default:
        if(!$_SESSION["loggedIn"]){ include("../needToLogin.php"); }
        else if($_SESSION["verified"]){ include("./list_sell.php"); }
        else{ include("./list_unverified_sell.php"); }
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

