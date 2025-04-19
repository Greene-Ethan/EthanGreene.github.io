<?php
function register_user($username,$password,$first_name, $last_name, $address, $city, $state, $postal,$country,$phone,$email) {
    global $db;
    $query = 'INSERT INTO users
              VALUES
                 (:username, :password, :first_name, :last_name, :address, :city, :state, :postal, :country, :phone, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal', $postal);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function update_user($username, $first_name, $last_name, $address, $city, $state, $postal,$country,$phone,$email) {
    global $db;
    $query = 'UPDATE users
              SET first_name = :first_name, last_name = :last_name, address = :address, city = :city, state = :state, postal = :postal, country = :country, phone = :phone, email = :email
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal', $postal);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function get_user($username, $password) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute(); 
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

function get_email($username) {
    global $db;
    $query = 'SELECT email FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_phone($username) {
    global $db;
    $query = 'SELECT phone FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_countryUser($username) {
    global $db;
    $query = 'SELECT country FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_postal($username) {
    global $db;
    $query = 'SELECT postal FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_state($username) {
    global $db;
    $query = 'SELECT state FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_city($username) {
    global $db;
    $query = 'SELECT city FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_address($username) {
    global $db;
    $query = 'SELECT address FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_last($username) {
    global $db;
    $query = 'SELECT last_name FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $rturn = $statement->fetchAll();
    $statement->closeCursor();
    return $rturn;
}

function get_first($username) {
    global $db;
    $query = 'SELECT first_name FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute(); 
    $first = $statement->fetchAll();
    $statement->closeCursor();
    return $first;
}