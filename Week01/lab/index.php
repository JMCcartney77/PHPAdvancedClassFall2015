<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme--> 
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/npm.js" type="text/javascript"></script>
        
    </head>
    <body>
        <div class="jumbotron">
            <h1>Advanced PHP</h1> 
            <h2>John McCartney</h2>
            <h3>Add Address</> 
        </div>
        <?php
        // put your code here

        require_once './functions/dbconnect.php';
        require_once './functions/until.php';



        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');



        if (isPostRequest()) {


            if (empty($fullname)) {
                $message = 'Full Name is Empty';
            } else if (empty($email)) {
                $message = 'Sorry email is Empty';
            } else if (empty($addressline1)) {
                $message = 'Sorry Address Line 1 is Empty';
            } else if (empty($city)) {
                $message = 'Sorry City is Empty';
            } else if (empty($state)) {
                $message = 'Sorry State is Empty';
            } else if (empty($zip)) {
                $message = 'Sorry Zip is Empty';
            } else if (empty($email)) {
                $message = 'Sorry Email is Empty';
            } else if (empty($birthday)) {
                $message = 'Sorry Birthday is Empty';
            } else if (addAddress($fullname, $email, $addressline1, $city, $state, $zip, $email, $birthday)) {
                $message = 'Address Added';
                $fullname = '';
                $addressline1 = '';
                $city = '';
                $state = '';
                $zip = '';
                $email = '';
                $birthday = '';
            }
        }
        include './views/messages.html.php';
        include './views/address-form.html.php';
        include './views/view-address.php';
        ?>
        
