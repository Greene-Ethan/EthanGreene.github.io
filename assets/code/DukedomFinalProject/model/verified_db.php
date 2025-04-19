<?php

function get_verified($username) {
    global $db;
    $query = 'SELECT verified FROM verification
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

function add_unverified($username) {
    global $db;
    $query = 'INSERT INTO verification
              VALUES
                 (:username, :verified)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':verified', 0);
    $statement->execute();
    $statement->closeCursor();
}
