<?php
function get_all_countries() {
    global $db;
    $query = 'SELECT * FROM countries
              WHERE 1 = 1';
    $statement = $db->prepare($query);
    $statement->execute(); 
    $country = $statement->fetchAll();
    $statement->closeCursor();
    return $country;
}

function get_country($countryCode) {
    global $db;
    $query = 'SELECT * FROM countries
              WHERE countryCode = :countryCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->execute(); 
    $country = $statement->fetchAll();
    $statement->closeCursor();
    return $country;
}
?>