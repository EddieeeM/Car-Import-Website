<?php
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

  if (!$result) {
    echo "Cannot find values within" + $query + "!...";
  } else {
    echo "<table border=\"1\">\n ";
    echo "<tr>\n"
          ."<th scope=\"col\">First Name</th>\n "
          ."<th scope=\"col\">Last Name</th>\n "
          ."<th scope=\"col\">Email</th>\n "
          ."<th scope=\"col\">ContactPref</th>\n "
          ."<th scope=\"col\">Street_Address</th>\n "
          ."<th scope=\"col\">Postcode</th>\n "
          ."<th scope=\"col\">State</th>\n "
          ."<th scope=\"col\">Suburb</th>\n "
          ."<th scope=\"col\">American Selection</th>\n "
          ."<th scope=\"col\">Japanese Selection</th>\n "
          ."<th scope=\"col\">Additional Addons</th>\n "
          ."<th scope=\"col\">Order Cost</th>\n " 
          ."<th scope=\"col\">Order Date</th>\n " 
          ."<th scope=\"col\">Order Status</th>\n " 
          ."<th scope=\"col\">Card Type</th>\n " 
          ."<th scope=\"col\">Card Number</th>\n " 
          ."<th scope=\"col\">Card Expiry</th>\n "
          ."<th scope=\"col\">Card CVV</th>\n "
          ."</tr>\n";
  }

  // while ($row = mysqli_fetch_assoc($result)) {
  //   echo "<fieldset>"
  //           ."<legend>Payment Details</legend>"
  //           ."<h1>Prefilled Information...</h1>"
  //           ."<p>Your Name: ",$row['customer_firstname'],"</span> </p>"
  //           ."<p>Email: <span> ",$row['customer_email'], "</span> </p>"
  //           ."<p>Phone Number: <span> ",$row['customer_phone'], "</span> </p>"
  //           ."<p>Address: <span> ",$row['customer_street_address'], "</span> </p>"
  //           ."<p>State: <span> ",$row['customer_state'], "</span> </p>"
  //           ."<p>Postcode: <span> ",$row['customer_postcode'], "</span> </p>"
  //           ."<p>Suburb: <span>" ,$row[$suburb]," </span> </p>"
  //           ."<p>Contact Preference: <span>",$row['customer_contactpref'],  " </span> </p>"
  //           ."<p>Modification: <span>",$row['customer_requests'], "</span> </p>"
  //           ."<p>Car Selection (Japanese): <span>",$row['customer_JDM'], "</span> </p>"
  //           ."<p>Car Selection (American): <span>",$row['customer_AMERICAN'], "</span> </p>"
  //           ."<p>Quantity: <span>",$row['customer_quantity'], "</span> </p>"
  //           ."<p>Total Cost: <span>",$row['order_cost'], "</span> </p>"
  //         ."</fieldset>";
  //   }

      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>\n ";
          echo "<td>",$row["customer_firstname"],"</td>\n ";
          echo "<td>",$row["customer_lastname"],"</td>\n ";
          echo "<td>",$row["customer_email"],"</td>\n ";
          echo "<td>",$row["customer_mobile"],"</td>\n ";
          echo "<td>",$row["customer_contactpref"],"</td>\n ";
          echo "<td>",$row["customer_address"],"</td>\n ";
          echo "<td>",$row["customer_postcode"],"</td>\n ";
          echo "<td>",$row["customer_state"],"</td>\n ";
          echo "<td>",$row["customer_suburb"],"</td>\n ";
          echo "<td>",$row["customer_AMERICAN"],"</td>\n ";
          echo "<td>",$row["customer_JDM"],"</td>\n ";
          echo "<td>",$row["customer_addon"],"</td>\n ";
          echo "<td>",$row["customer_quantity"],"</td>\n ";
          echo "<td>",$row["Order_Cost"],"</td>\n ";
          echo "<td>",$row["Order_Status"],"</td>\n ";
          echo "<td>",$row["Order_Date"],"</td>\n ";
          echo "<td>",$row["customer_cardtype"],"</td>\n ";
          echo "<td>",$row["customer_cardnumber"],"</td>\n ";
          echo "<td>",$row["customer_cardexpiry"],"</td>\n ";
          echo "<td>",$row["customer_cvv"],"</td>\n ";
          echo "</tr>\n ";
      }
      echo "</table>\n ";
  }
?>