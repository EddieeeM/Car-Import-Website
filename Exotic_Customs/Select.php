 $conn = @mysqli_connect(
        $host, $user, $pwd, $sql_db
    );

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