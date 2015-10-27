<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function addAddress($fullname, $addressline1, $city, $state, $zip, $email, $birthday) {
    
    //Inputting the field info into the db colomns
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, email = :email, birthday = :birthday")  ;
    $binds = array(
        ":fullname" => $fullname,
        ":addressline1" => $addressline1,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":email" => $email,
        ":birthday" => $birthday,        
    );
    //If all fields are correct adds the row to to the table
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

function getaddAddress() {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM addAddress");
    
    //Displays results
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $results;
}

 