<?php
session_start();
require('../model/database.php');
require('../model/database_oo.php');
require('../model/house_db.php');
require('../model/userBuy_db.php');

$action = filter_input(INPUT_GET, 'action');

if(empty($_SESSION["user"])){
    $action = "needsLogin";     //user needs to login. Action will direct user accordingly
}

$path = "house_3.jpeg"; 
switch($action){
    
    case "needsLogin":
        include("loginToBuy.php");
        break;
    
    case "house3":
        $house3 = getHouse($path)[0];
        $addy = $house3[0];
        $path = $house3[1];
        $percent = $house3[2];
        $price = $house3[3];
        $buyIn = $house3[4];
        include("./list_property.php");
        break;
    
    case "buyPercent":
        $percentBought = filter_input(INPUT_GET, 'percent');
        $house3 = getHouse($path)[0];
        $priceOld = $house3[3];
        $percentOld = $house3[2];
        $_SESSION["percentBought"] = $percentBought;
        $_SESSION["priceBought"] = ($percentBought * .01) * $priceOld;
        $priceNew = $priceOld - ($percentBought * .01) * $priceOld;
        $percentNew = $percentOld - $percentBought;
        updatePercent($path, $percentNew);
        updatePrice($path, $priceNew);
        $user = $_SESSION['user'];
        insertUserPercent($user,$percentBought,$path);
        $house3 = getHouse($path)[0];
        $addy = $house3[0];
        $path = $house3[1];
        $percent = $house3[2];
        $price = $house3[3];
        $buyIn = $house3[4];
        include("./list_property.php");
        break;
        
    default:
        $House1 = getHouse($path); //House: [0] Address, [1] Path, [2] Percent, [3] Price, [4] BuyIn
        $House2;
        $house3 = getHouse($path)[0];
        $House4;
        $House5;
        $addy = $house3[0];
        $path = $house3[1];
        $percent = $house3[2];
        $price = $house3[3];
        $buyIn = $house3[4];
        include("./list_properties.php");
        break;
}