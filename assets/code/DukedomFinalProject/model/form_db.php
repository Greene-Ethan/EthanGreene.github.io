<?php
function submit_form($form,$email) {
    global $db;
    $query = 'INSERT INTO contacts
              VALUES
                 (:form, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':form', $form);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}
