<?php
function getHouse($path) {
    global $db;
    $query = 'SELECT * FROM house
              WHERE path = :path';
    $statement = $db->prepare($query);
    $statement->bindValue(':path', $path);
    $statement->execute();
    $house = $statement->fetchAll();
    $statement->closeCursor();
    return $house;
}

function getXHouses($numHouses) {
    global $db;
    $query = 'SELECT * '
            . 'FROM house '
            . 'limit :numHouses';
    $statement = $db->prepare($query);
    $statement->bindValue(':numHouses', $numHouses);
    $statement->execute();
    $houses = $statement->fetchAll();
    $statement->closeCursor();
    return $houses;
}

function updatePercent($path,$percent) {
    global $db;
    $query = 'UPDATE house
              SET percent = :percent
              WHERE path = :path';
    $statement = $db->prepare($query);
    $statement->bindValue(':path', $path);
    $statement->bindValue(':percent', $percent);
    $statement->execute();
    $house = $statement->fetchAll();
    $statement->closeCursor();
    return $house;
}

function updatePrice($path,$price) {
    global $db;
    $query = 'UPDATE house
              SET price = :price
              WHERE path = :path';
    $statement = $db->prepare($query);
    $statement->bindValue(':path', $path);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $house = $statement->fetchAll();
    $statement->closeCursor();
    return $house;
}

function addHouse($address,$path,$percent,$price, $buy_in) {
    global $db;
    $query = 'INSERT INTO house
              VALUES
              (:address, :path, :percent, :price, :buy_in)';
    $statement = $db->prepare($query);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':path', $path);
    $statement->bindValue(':percent', $percent);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':buy_in', $buy_in);
    $statement->execute();
    $house = $statement->fetchAll();
    $statement->closeCursor();
    return $house;
}
