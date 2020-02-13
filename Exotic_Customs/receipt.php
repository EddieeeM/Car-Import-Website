<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="102347754">
    <meta name="keywords" content="order receipt, exotic customs">
    <meta name="desctiption" content="displays all the values sent and cost">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDER RECEIPT</title>
</head>
<body>
  <?php
    require_once "settings.php" ;       //Connection Info

    $conn = @mysqli_connect(
        $host, $user, $pwd, $sql_db
    );

  if (!$conn) {
    echo "<p>Database Connection Failure!</p>";
  } else {
    $sql_table = "Order_Table";
    echo "<p>Database Connected</p>";
    $query = "SELECT customer_firstname, 
      customer_lastname, 
      customer_email, 
      customer_mobile, 
      customer_contactpref, 
      customer_address, 
      customer_postcode, 
      customer_state, 
      customer_suburb, 
      customer_AMERICAN, 
      customer_JDM, 
      customer_addon, 
      customer_quantity, 
      order_id, 
      order_cost, 
      order_date, 
      order_status, 
      customer_cardtype, 
      customer_cardnumber, 
      customer_cardexpiry, 
      customer_cvv,
  FROM Order_Table 
  ORDER BY customer_firstname, 
      customer_lastname, 
      customer_email, 
      customer_mobile, 
      customer_contactpref, 
      customer_address, 
      customer_postcode, 
      customer_state, 
      customer_suburb, 
      customer_AMERICAN, 
      customer_JDM, 
      customer_addon, 
      customer_quantity, 
      order_id, 
      order_cost, 
      order_date, 
      order_status, 
      customer_cardtype, 
      customer_cardnumber, 
      customer_cardexpiry, 
      customer_cvv";
  $result = mysqli_query($conn, $query);
  }


  // if (!$result) {
  //   echo "<p>Database cannot find anything!</p>";
  //   echo "Cannot find values within" + $query + "!...";
  // } else {
  //   echo "<table border=\"1\">\n ";
  //   echo "<tr>\n"
  //         ."<th scope=\"col\">First Name</th>\n "
  //         ."<th scope=\"col\">Last Name</th>\n "
  //         ."<th scope=\"col\">Email</th>\n "
  //         ."<th scope=\"col\">ContactPref</th>\n "
  //         ."<th scope=\"col\">Street_Address</th>\n "
  //         ."<th scope=\"col\">Postcode</th>\n "
  //         ."<th scope=\"col\">State</th>\n "
  //         ."<th scope=\"col\">Suburb</th>\n "
  //         ."<th scope=\"col\">American Selection</th>\n "
  //         ."<th scope=\"col\">Japanese Selection</th>\n "
  //         ."<th scope=\"col\">Additional Addons</th>\n "
  //         ."<th scope=\"col\">Quantity</th>\n "
  //         ."<th scope=\"col\">Order Cost</th>\n " 
  //         ."<th scope=\"col\">Order Date</th>\n " 
  //         ."<th scope=\"col\">Order Status</th>\n " 
  //         ."<th scope=\"col\">Card Type</th>\n " 
  //         ."<th scope=\"col\">Card Number</th>\n " 
  //         ."<th scope=\"col\">Card Expiry</th>\n "
  //         ."<th scope=\"col\">Card CVV</th>\n "
  //         ."</tr>\n";
  // }

//   while ($row = mysqli_fetch_assoc($result)) {
//     echo "<tr>\n ";
//     echo "<td>",$row["customer_firstname"],"</td>\n ";
//     echo "<td>",$row["customer_lastname"],"</td>\n ";
//     echo "<td>",$row["customer_email"],"</td>\n ";
//     echo "<td>",$row["customer_mobile"],"</td>\n ";
//     echo "<td>",$row["customer_contactpref"],"</td>\n ";
//     echo "<td>",$row["customer_address"],"</td>\n ";
//     echo "<td>",$row["customer_postcode"],"</td>\n ";
//     echo "<td>",$row["customer_state"],"</td>\n ";
//     echo "<td>",$row["customer_suburb"],"</td>\n ";
//     echo "<td>",$row["customer_AMERICAN"],"</td>\n ";
//     echo "<td>",$row["customer_JDM"],"</td>\n ";
//     echo "<td>",$row["customer_addon"],"</td>\n ";
//     echo "<td>",$row["order_cost"],"</td>\n ";
//     echo "<td>",$row["order_date"],"</td>\n ";
//     echo "<td>",$row["order_status"],"</td>\n ";
//     echo "<td>",$row["cardtype"],"</td>\n ";
//     echo "<td>",$row["cardnumber"],"</td>\n ";
//     echo "<td>",$row["cardexpiry"],"</td>\n ";
//     echo "<td>",$row["cvv"],"</td>\n ";
//     echo "</tr>\n ";
// }
// echo "</table>\n ";
?>

<fieldset>
            <legend>Personal Details obtained from payment</legend>
            <p>Your Name:<?php 
            $givenname = $_POST["givenname"];
            $familyname = $_POST["familyname"];
            echo $givenname, $familyname; ?></p>
            <p>Email Address: <?php $email = $_POST["email"];
            echo $email; ?> </p>
            <p>Street Address:<?php $street_address = $_POST["street_address"];
            echo $street_address; ?> </p>
            <p>Suburb: <?php $suburb = $_POST["suburb"];
            echo $suburb; ?> </p>
            <p>State: <?php $state = $_POST["state"];
            echo $state; ?> </p>
            <p>Postcode: <?php $postcode = $_POST["postcode"];
            echo $postcode; ?> </p>
            <p>Phone number: <?php $phone = $_POST["phone"];
            echo $phone; ?> </p>
            <p>Preferred Contact Details: <?php $contactpref = $_POST["contactpref"];
            echo $contactpref; ?> </p>
            <p>JDM: <?php $Selection_J = $_POST["Selection_J"];
            echo $Product; ?> </p>
            <p>ADM: <?php $Selection_A = $_POST["Selection_A"];
            echo $PriceType; ?></p>
            <p>Modifications: <?php $requests = $_POST["requests"];
            echo $requests; ?></p>
            <p>Quantity: <?php $quantity = $_POST["quantity"];
            echo $quantity; ?></p>
            <p>Cost: <?php $cost = $_POST["cost"];
            echo $cost; ?></p>
            <p>Order Date: <?php $date = $_POST["date"];
            echo $date; ?></p>
            <p>Card Type : <?php $Card_Type = $_POST["Card_Type"];
            echo $Card_Type; ?></p>
            <p>Card Name: <?php $cardname = $_POST["cardname"];
            echo $cardname; ?></p>
            <p>Card Number: <?php $CreditNumber = $_POST["cardnumber"];
            echo $CreditNumber; ?></p>
            <p>Card Expiry: <?php $CreditExpiry = $_POST["cvv"];
            echo $CreditExpiry; ?></p>
            <p>CVV: <?php $cvv = $_POST["cvv"];
            echo $cvv; ?></p>
          </fieldset>
</body>
</html>