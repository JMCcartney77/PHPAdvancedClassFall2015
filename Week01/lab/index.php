<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme--> 
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/npm.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
    </head>

    <body>
        <div class="jumbotron">
            <h1>Advanced PHP</h1> 
        </div>

        <!--<div class="background"> 
            <img src="/images/solar.jpg" alt="HTML5 Icon" style="width:128px;height:128px;">
        </div>-->
        <?php
        // put your code here

        require_once './functions/dbconnect.php';
        require_once './functions/until.php';

        $fullname = filter_input(INPUT_POST, 'regexfullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');

        //Regex validation for each field
        $regexzip = '/^[0-9]{5}(?:-[0-9]{4})?$/';
        $regexfullname = '/^[^<,\"@/{}()*$%?=>:|;#]*$/i';
        $regexaddressline1 = '/^([0-9]+ )?[a-zA-Z ]+$/';
        $regexcity = '/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/';
        $isValid = true;
        $error = array();

        //I must be slow or something, I am having a hard time with Validation!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if (isPostRequest()) {
            //Repeat for each field
            if (empty($fullname)) {
                $error[] = '"Full Name" is required.';
            } 
            if (empty($email)) {
                $message[] = 'Email needed';
            }
            if (empty($addressline1)) {
                $message[] = 'Address needed';
            }
            if (empty($city)) {
                $message[] = 'City is Empty';
            }
            if (empty($state)) {
                $message[] = 'State is Empty';
            }
            if (empty($zip)) {
                $message[] = 'Zip is Empty';
            }
            if (empty($birthday)) {
                $message[] = 'Birthday is Empty';
            }
            //$email = "john.doe@example.com";

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
                echo("$email is not a valid email address");
            }
            if (is_array($error) && count($error) > 0) {
                $isValid = false;
                foreach ($error as $err) {
                    echo '<div class="alert alert-warning alert-size"><p>', $err, '</p></div>';
                }
            }
            if ($isValid) {

                //If successfull output "Address Added"
                addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday);
                echo '<div class="alert alert-success alert-size"><p>Address Added</p></div>';
                $fullname = '';
                $email = '';
                $address = '';
                $city = '';
                $state = '';
                $zip = '';
                $birthday = '';
            }
        }


        include './views/messages.html.php';
        include './views/address-form.html.php';
        include './views/view-address.php';
        ?>

        <div class="goback">
            <a href="index.php">Home</a>
        </div>




