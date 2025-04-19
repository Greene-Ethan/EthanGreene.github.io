<?php

function getCurrentPercent($owner, $path) {
    global $db;
    $query = 'SELECT percentOwned FROM userspercents
              WHERE path = :path AND owner = :owner';
    $statement = $db->prepare($query);
    $statement->bindValue(':path', $path);
    $statement->execute();
    $percentOwned = $statement->fetchAll();
    $statement->closeCursor();
    return $percentOwned;
}

function updateUserPercent($owner,$percent,$path) {
    global $db;
    $query = 'UPDATE userspercents
              SET percentOwned = :percent
              WHERE path = :path AND owner = :owner';
    $statement = $db->prepare($query);
    $statement->bindValue(':owner', $owner);
    $statement->bindValue(':percent', $percent);
    $statement->bindValue(':path', $path);
    $statement->execute();
    $house = $statement->fetchAll();
    $statement->closeCursor();
    return $house;
}

function insertUserPercent($owner,$percent,$path) {
    global $db;
    $query = 'INSERT INTO userspercents
              VALUES
              (:owner, :percent, :path)';
    $statement = $db->prepare($query);
    $statement->bindValue(':owner', $owner);
    $statement->bindValue(':percent', $percent);
    $statement->bindValue(':path', $path);
    $statement->execute();
    $house = $statement->fetchAll();
    $statement->closeCursor();
    return $house;
}