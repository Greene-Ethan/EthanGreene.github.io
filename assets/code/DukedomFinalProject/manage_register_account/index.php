<?php
require('../model/database.php');
require('../model/database_oo.php');
require('../model/user_db.php');
require('../model/country_db.php');
require('../model/verified_db.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_register_account';
    }
}

if ($action == 'show_register_account') {
    $countriesAll = get_all_countries();
    include('user_register.php');
} 
    else if($action == 'register_user'){
    $username = filter_input(INPUT_POST, 'username'); 
    $password = filter_input(INPUT_POST, 'password'); 
    $first_name = filter_input(INPUT_POST, 'firstName'); 
    $last_name = filter_input(INPUT_POST, 'lastName'); 
    $address = filter_input(INPUT_POST, 'address'); 
    $city = filter_input(INPUT_POST, 'city'); 
    $state = filter_input(INPUT_POST, 'state'); 
    $postal = filter_input(INPUT_POST, 'postalCode'); 
    $country = filter_input(INPUT_POST, 'countries');
    $phone = filter_input(INPUT_POST, 'phone'); 
    $email = filter_input(INPUT_POST, 'email'); 
    if(!($username == false ||$first_name == false || $last_name == false || $address == false || $city == false || $state == false || $postal == false || $country == false || $phone == false || $email == false || $password == false)){
        $customer = register_user($username,$password,$first_name, $last_name, $address, $city, $state, $postal,$country,$phone,$email);
        add_unverified($username);
        include('./user_register_success.php');
    }
    else {
        $error = "You left a field blank, please go back and recheck entries.";
        include('./user_register_fail.php');
    }
}

