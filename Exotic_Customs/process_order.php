<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manipulation of order submitted"/>
    <meta name="author" content="102347754"/>
    <meta name="keywords" content="order, fix"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Processing Orders... --> Exotic Customs</title>
    <link href= "styles/style.css" rel="stylesheet" />
    <script src= "scripts/part2.js"></script>
</head>
<body>

<?php
     require_once "settings.php";

     $conn = @mysqli_connect(
         $host, $user, $pwd, $sql_db
     );

     if (!$conn) {
         echo "<p>Invalid login details!";
     }
     else {
        session_start();

        $givenname = trim($_SESSION["givenname"]);
        $familyname = trim($_SESSION["familyname"]);
        $email = trim($_SESSION["email"]);
        $phone = trim($_SESSION["phone"]);
        $street_address = trim($_SESSION["street_address"]);
        $suburb = trim($_SESSION["suburb"]);
        $postcode = trim($_SESSION["postcode"]);
        $Selection_A = trim($_SESSION["Selection_A"]);
        $Selection_J = trim($_SESSION["Selection_J"]);
        $quantity = trim($_SESSION["quantity"]);
        $date = trim($_SESSION["date"]);
        $cost = trim($_SESSION["cost"]);

        $contactpref = trim($_SESSION["contactpref"]);
        $state = trim($_SESSION["state"]);
        $requests = trim($_SESSION["requests"]);

        //$cardname = trim($_SESSION["cardname"]);
        $cardnumber= trim($_POST["cardnumber"]);
        $cardexpiry = trim($_POST["cardexpiry"]);
        $cvv = trim($_POST["cvv"]);
        $Card_Type = trim($_POST["Card_Type"]);

        // $givenname = trim($_POST["givenname"]);
        // $familyname = trim($_POST["familyname"]);
        // $email = trim($_POST["email"]);
        // $phone = trim($_POST["phone"]);
        // $street_address = trim($_POST["street_address"]);
        // $suburb = trim($_POST["suburb"]);
        // $postcode = trim($_POST["postcode"]);
        // $Selection_A = trim($_POST["Selection_A"]);
        // $Selection_J = trim($_POST["Selection_J"]);
        // $quantity = trim($_POST["quantity"]);
        // $date = trim($_POST["date"]);
        // $cost = trim($_POST["cost"]);
        
        if ($errMsg == ""){
        $_POST["givenname"] = $givenname;
        $_POST["familyname"] = $familyname;
        $_POST["email"] = $email; 
        $_POST["phone"] = $phone;
        $_POST["street_address"] = $street_address;
        $_POST["suburb"] = $suburb;
        $_POST["state"] = $state;
        $_POST["postcode"] = $postcode;
        $_POST["Selection_A"] = $Selection_A;
        $_POST["Selection_J"] = $Selection_J;
        $_POST["quantity"] = $quantity;
        $_POST["date"] = $date;
        $_POST["contactpref"] = $contactpref;
        $_POST["requests"] = $requests;
        }  else {
            header("location: fix_order.php");
        }
     }
    
    $conn -> close();
?>



<?php
//------------------------------------ERRORS--------------------------------//
$errMsg = [];

    function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);            // Security measures
    $data = htmlspecialchars($data);
    return $data;
    }


    if (isset ($_SESSION["givenname"])) {
        $givenname = $_POST["givenname"];
        if ($_SESSION["givenname"]=="") {
            $errMsg[] .= "<p>You must enter your first name.</p>";
            //echo "<p>empty</p>";
        } else if (!preg_match("/^[a-zA-Z0-9 ]*$/",$givenname)) {
            $errMsg[] .= "<p>Only alpha letters allowed in your first name</p>";
            //echo "<p>empty2</p>";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter your First Name in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }


    if (isset ($_SESSION["familyname"])) {
        $familyname = $_POST["familyname"];
        if ($_SESSION["familyname"]=="") {
            $errMsg[] .= "<p>You must enter your last name.</p>";
        } else if (!preg_match("/^[a-zA-Z- ]*$/",$familyname)) {
            $errMsg[] .= "<p>Only alpha letters allowed in your last name</p>";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter your Last Name in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }

    
    if (isset ($_SESSION["email"])) {
        $email = $_POST["email"];
        if ($_SESSION["email"]=="") {
            $errMsg[] .= "<p>You must enter your email address.</p>";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter a valid email in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }


    if (isset ($_SESSION["phone"])) {
        $phone = $_POST["phone"];
        if ($_SESSION["phone"]=="") {
            $errMsg[] .= "<p>You must enter a valid mobile number!</p>";
        } else if (!is_numeric($_SESSION["phone"]) && !preg_match("/^\d{10}/",$phone)) {
            $errMsg[] .= "<p>Mobile should be numeric</p>";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter you mobile number in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }


    if (isset ($_SESSION["street_address"])) {
        $street_address = $_POST["street_address"];
        if ($_SESSION["street_address"]=="") {
            $errMsg[] .= "<p>You must enter your address.</p>";
        } else if (!preg_match("/^\d+[a-zA-Z\s]{1,40}$/",$_SESSION["street_address"])) {
            $errMsg[] .= "<p>Enter a proper address!</p>";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter Street Address in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }
    if (isset ($_SESSION["suburb"])) {
        $suburb= $_POST["suburb"];
        if ($_SESSION["suburb"]=="") {
            $errMsg[] .= "<p>You must enter your suburb.</p>";
        } else if (!preg_match("/^[a-zA-Z- ]*$/",$_SESSION["suburb"])) {
            $errMsg[] .= "<p>Enter a valid suburb!";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter Suburb in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }
    if (isset ($_SESSION["postcode"])) {
        $postcode= $_POST["postcode"];
        if ($_SESSION["postcode"]=="") {
            $errMsg[] .= "<p>You must enter a valid postcode.</p>";
          } else if (!preg_match("/^\d{3,4}/",$_SESSION["postcode"])) {
            $errMsg[] .= "<p>Postcode length invalid!</p>";
          } 
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter Postcode in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }
    if (isset ($_SESSION["quantity"])) {
        $quantity= $_POST["quantity"];
        $quantity= intval($quantity);
        if ($_SESSION["quantity"] =="") {
            $errMsg[] .= "<p>Please enter a quantity (0 if not getting anything).</p>";
        } else if (!is_numeric($_SESSION["quantity"])) {
            $errMsg[] .= "<p>Numeric values only for quantity...</p>";
        }
    }
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter Quantity in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }
    
    if (isset ($_SESSION["state"])) {
        $state = $_POST["state"];
        if($_SESSION["state"] == "") {
            $errMsg[] .= "<p>State not selected</p>";
        }
        else if ($_SESSION["state"] == "VIC" && !preg_match("/^(3|8)\d+/",$_SESSION["postcode"])){
            $errMsg[] .= "<p>Must begin with a 3 or 8 in postcode for VIC</p>";
        }
        else if ($_SESSION["state"] == "NSW" && !preg_match("/^(1|2)\d+/",$_SESSION["postcode"])){
            $errMsg[] .= "<p>Must begin with a 1 or 2 in postcode for NSW</p>";
        }
        else if ($_SESSION["state"] == "QLD" && !preg_match("/^(4|9)\d+/",$_SESSION["postcode"])){
            $errMsg[] .= "<p>Must begin with a 4 or 9 in postcode for QLD</p>";
        }
        else if ($_SESSION["state"] == "NT" && !preg_match("/^(5)\d+/",$_SESSION["postcode"])){
            $errMsg[] .= "<p>Must begin with a 5 in postcode for NT</p>";
        }
        else if ($_SESSION["state"] == "WA" && !preg_match("/^0\d+/",$_SESSION["postcode"])){
            $errMsg[] .= "<p>Must begin with a 0 in postcode for WA</p>";
        }
        else if ($_SESSION["state"] == "SA" && !preg_match("/^6\d+/",$_SESSION["postcode"])){
            $errMsg[] .= "<p>Must begin with a 6 in postcode for SA</p>";
        }
        else {
        //Display Error Message, if process not triggered by a form submit
        echo "<p>Error: Select a State in the <a href=\"enquire.php\">form</a></p>";
        //header ("location: enquire.php");
        }
    }

    if (isset ($_SESSION["requests"])) {
        $requests = $_POST["requests"];
        echo $requests;
    } 
    else {
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Enter a Request in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }

    $requests = "";
    if (isset ($_SESSION["Automatic"])) {
        $requests = $requests. "Automatic";
        $requests = intval($requests);
        //echo "<p>Request: $requests </p>";
    }
    if (isset ($_SESSION["Manual"])) {
        $requests = $requests. "Manual";
        $requests = intval($requests);
        //echo "<p>Request: $requests </p>";
    }
    if (isset ($_SESSION["Spoiler"])) {
        $requests = $requests. "Spoiler";
        $requests = intval($requests);
        //echo "<p>Request: $requests </p>";
    }
    if (isset ($_SESSION["Automatic"])) {
        $requests = $requests. "Automatic";
        $requests = intval($requests);
        //echo "<p>Request: $requests </p>";
    }
    else {
        //Display Error Message, if process not triggered by a form submit
        //echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
        //header ("location: enquire.php");
    }


    if (isset ($_SESSION["contactpref"])) {
        $contactpref = $_POST["contactpref"];
        if ($_SESSION["contactpref"] =="") {
            $errMsg[] .= "<p>Please select a contact preference.</p>";
        }
    }
    else{
    //Display Error Message, if process not triggered by a form submit
    echo "<p>Error: Select Contact Preference in the <a href=\"enquire.php\">form</a></p>";
    //header ("location: enquire.php");
    }

    $contactpref = "";
    if (isset ($_SESSION["E-Mail"])) {
        $contactpref = $contactpref. "E-Mail";
        //echo "<p>Contact Preference: $contactpref </p>";
    }
    if (isset ($_SESSION["Post Mail"])) {
        $contactpref = $contactpref. "Post Mail";
        //echo "<p>Contact Preference: $contactpref </p>";
    }
    if (isset ($_SESSION["Mobile"])) {
        $contactpref = $contactpref. "Mobile";
        //echo "<p>Contact Preference: $contactpref </p>";
    }
    else {
        //Display Error Message, if process not triggered by a form submit
        //echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
        //header ("location: enquire.php");
    }

    $Selection_A = "";
    if (isset ($_SESSION["Selection_A"])){
        $Selection_A = $_POST["Selection_A"];
    }
    if ($_SESSION["Selection_A"] =="") {
        $errMsg[] .= "<p>Please Select an option for American Cars.</p>";
    }
    if (isset ($_SESSION["Ford Mustang"])) {
        $Selection_A = $Selection_A. "Ford Mustang";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    if (isset ($_SESSION["Chevrolet Camaro"])) {
        $Selection_A = $Selection_A. "Chevrolet Camaro";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    if (isset ($_SESSION["Cadillac CTS"])) {
        $Selection_A = $Selection_A. "Cadillac CTS";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    if (isset ($_SESSION["Dodge Charger"])) {
        $Selection_A = $Selection_A. "Dodge Charger";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    if (isset ($_SESSION["Dodge Viper"])) {
        $Selection_A = $Selection_A. "Dodge Viper";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    if (isset ($_SESSION["Chevrolet Corvette"])) {
        $Selection_A = $Selection_A. "Chevrolet Corvette";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    if (isset ($_SESSION["No Selection"])) {
        $Selection_A = $Selection_A. "No Selection";
        //echo "<p>Selection_A: $Selection_A </p>";
    }
    else {
        //Display Error Message, if process not triggered by a form submit
        //echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
        //header ("location: enquire.php");
    }

    $Selection_J = "";

    if (isset ($_SESSION["Selection_J"])){
        $Selection_J = $_POST["Selection_J"];
    }
    if ($_SESSION["Selection_J"] =="") {
        $errMsg[] .= "<p>Please Select an option for Japanese Cars.</p>";
    }    
    if (isset ($_SESSION["Toyota Supra"])) {
        $Selection_J = $Selection_J. "Toyota Supra";
    } 
    if (isset ($_SESSION["Nissan Skyline"])) {
        $Selection_J = $Selection_J. "Nissan Skyline";
        //echo "<p>Selection_J: $Selection_J </p>";
    }
    if (isset ($_SESSION["Mazda RX7"])) {
        $Selection_J = $Selection_J. "Mazda RX7";
        //echo "<p>Selection_J: $Selection_J </p>";
    }
    if (isset ($_SESSION["Nissan Silvia"])) {
        $Selection_J = $Selection_J. "Nissan Silvia";
        //echo "<p>Selection_J: $Selection_J </p>";
    }
    if (isset ($_SESSION["Honda S2000"])) {
        $Selection_J = $Selection_J. "Honda S2000";
        //echo "<p>Selection_J: $Selection_J </p>";
    }
    if (isset ($_SESSION["Mazda RX8"])) {
        $Selection_J = $Selection_J. "Mazda RX8";
        //echo "<p>Selection_J: $Selection_J </p>";
    }
    if (isset ($_SESSION["No Selection"])) {
        $Selection_J = $Selection_J. "No Selection";
        //echo "<p>Selection_J: $Selection_J </p>";
    }
    else {
        //Display Error Message, if process not triggered by a form submit
        //echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
        //header ("location: enquire.php");
    }

    if (isset ($_POST["Card_Type"])){
        $Card_Type = $_POST["Card_Type"];
    } else if ($_POST["Card_Type"] =="") {
        $errMsg[] .= "<p>Select a card type!</p>";
    } 

    if ($_POST["cardnumber"] =="") {
      $errMsg[] .= "<p>Please enter a Card Number.</p>";
    } else if (!preg_match("/^\d{15,16}[0-9]*$/",$_POST["cardnumber"])) {
      $errMsg[] .= "<p>Numeric values only for Card Number...</p>";
    } else if ($_POST["Card_Type"] == "Mastercard" && !preg_match("/^(?:5[1-5][0-9]{14})$/",$_POST["cardnumber"])) {
      $errMsg[] .= "<p>Invalid Card Number for your Mastercard!";
    } else if ($_POST["Card_Type"] == "Visa" && !preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?)$/",$_POST["cardnumber"])) {
      $errMsg[] .= "<p>Invalid Card Number for your Visa Card!";
    } else if ($_POST["Card_Type"] == "American Express" && !preg_match("/^(?:3[47][0-9]{13})$/",$_POST["cardnumber"])){
      $errMsg[] .= "<p>Invalid Card Number for your Amex Card!";
    }
    
    if ($_POST["cardexpiry"] =="") {
      $errMsg[] .= "<p>Enter a Card Expiry Date!";
    } else if ($_POST["cardexpiry"] <= date("m/y") && !preg_match("/^(0[1-9]|1[0-2]|[1-9])\/(1[8-9]|[2-9][0-9]|20[1-9][1-9])*$/")){
      $errMsg[] .= "<p>Invalid Card Expiry Date!!";
    }
    
    if (isset($_POST["cvv"])){
        $cvv = $_POST["cvv"];
    }
    else if ($_POST["cvv"] =="") {
      $errMsg[] .= "<p>Please enter a CVV.</p>";
    } 
    else if (!is_numeric($_POST["cvv"])) {
      $errMsg[] .= "<p>Numeric values only for CVV...</p>";
    }
    else if ($_POST["Card_Type"] == "Mastercard" && !preg_match("/^[3]*$/",$_POST["cvv"])){
        $errMsg[] .= "<p> Invalid Details for the given card type! CVV Length must be 3 digits...</p>";
    } 
    else if ($_POST["Card_Type"] == "Visa"  && !preg_match("/^[3]*$/",$_POST["cvv"])){
        $errMsg[] .= "<p> Invalid Details for the given card type! CVV Length must be 3 digits...</p>";
    }
    else if ($_POST["Card_Type"] == "American Express"  && !preg_match("/^[4]*$/",$_POST["cvv"])){
        $errMsg[] .= "<p> Invalid Details for the given card type! CVV Length must be 4 digits...</p>";
    }

if(isset($_POST["cost"])){
    $cost = $_POST["cost"];
    $cost = intval($cost);
    $cost = $_POST["quantity"] * $_POST["requests"];
}

// if ($cost == "") {
//     $cost += $quantity * $request;
//     echo "<p>$cost</p>";
// }

//---------------------------------------------------------------------------------------//

    $givenname = sanitise_input($givenname);
    $familyname = sanitise_input($familyname);
    $email = sanitise_input($email);
    $phone = sanitise_input($phone);
    $street_address= sanitise_input($street_address);
    $suburb= sanitise_input($suburb);
    $postcode= sanitise_input($postcode);
    $quantity= sanitise_input($quantity);
    $date= sanitise_input($date);
    $Selection_A = sanitise_input($Selection_A);
    $Selection_J = sanitise_input($Selection_J);
    $cost = sanitise_input($cost);

    $contactpref = sanitise_input($contactpref);
    $state= sanitise_input($state);
    $requests = sanitise_input($requests);
    $Card_Type = sanitise_input($Card_Type);
    $cardname = sanitise_input($cardname);
    $cardnumber = sanitise_input($cardnumber);
    $cardexpiry = sanitise_input($cardexpiry);
    $cvv = sanitise_input($cvv);

//-----------------------------------------------------------------//

$_SESSION["errMsg"] = $errMsg;

if ((count($_SESSION['errMsg'])) > 0) {
    header ("location: fix_order.php");
}
else{
    header ("location: receipt.php");
}

//-----------------------------------------------------------------//
?>

<?php
require_once "settings.php";

$conn = @mysqli_connect(
    $host, $user, $pwd, $sql_db
);

if (!$conn) {
    echo "<p>Invalid login details!";
}
else {
    $sql_table = "Order_Table";
    $sql = "INSERT INTO $sql_table ( 
                customer_firstname 
                ,customer_lastname 
                ,customer_email 
                ,customer_mobile 
                ,customer_contactpref 
                ,customer_address 
                ,customer_postcode 
                ,customer_state 
                ,customer_suburb 
                ,customer_AMERICAN 
                ,customer_JDM 
                ,customer_addon 
                ,customer_quantity 
                ,order_cost 
                ,order_date 
                ,order_status 
                ,customer_cardtype 
                ,customer_cardnumber 
                ,customer_cardexpiry 
                ,customer_cvv)
            VALUES ('$givenname' 
                ,'$familyname' 
                ,'$email' 
                ,'$phone' 
                ,'$contactpref' 
                ,'$street_address' 
                ,'$postcode' 
                ,'$state' 
                ,'$suburb' 
                ,'$Selection_A'
                ,'$Selection_J' 
                ,'$requests' 
                ,'$quantity' 
                ,'$cost' 
                ,'$date' 
                ,'$status' 
                ,'$Card_Type' 
                ,'$cardnumber' 
                ,'$cardexpiry' 
                ,'$cvv')";
    $result = mysqli_query($conn, $sql);

    // if ($conn -> query($sql) === true){
    //     echo "New Record Created";
    // } else {
    //     echo "NO record" . $sql . "<br />" . $conn -> error;
    // }

    // $conn -> close();
}

?>

</body>
</html>