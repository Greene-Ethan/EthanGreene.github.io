<?php
require('../model/database.php');
require('../model/database_oo.php');


$action = filter_input(INPUT_POST, 'action');
echo $action;
switch($action){
        
    default:
        include("./about_list.php");
        break;
}