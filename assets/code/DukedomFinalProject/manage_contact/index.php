<?php
require('../model/database.php');
require('../model/database_oo.php');
require('../model/form_db.php');

$action = filter_input(INPUT_POST, 'action');
switch($action){
        
    case "submit_form":
        $form = filter_input(INPUT_POST, 'form');
        $email = filter_input(INPUT_POST, 'email');
        if (($form == false) | ($email == false)){
            $error = "Invalid input. Try again.";
            include('./list_form_fail.php');
        } 
        else{
            submit_form($form,$email);
            include("./form_sucess.php");
        }
        break;
        
    default:
        include("./list_contact.php");
        break;
}