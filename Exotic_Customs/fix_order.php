<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="payment page of the website" />
    <meta name="author" content="Edeser III Monserrate, 102347754" />
    <meta name="keywords" content="payment, form, car purchase" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fix Order - Exotic Customs</title>
    <link href= "styles/style.css" rel="stylesheet" />
    <script src= "scripts/part2.js"></script>
</head>
<body id = "pmtpage">                   <!--Modified version of payment.php-->

<section class="container">
  <div id="header">
    <?php include_once "includes/header.inc"; ?>
    <div id="nav_bar">
      <nav>
        <?php include_once "includes/nav.inc"; ?>
      </nav>
    </div>
  </div>
</section>

<section class="content_area">
    <div id="banner">
        <?php include_once "includes/banner1.inc"; ?>
    </div>
</section>

<form id="payment_form" method="post" action="process_order.php" novalidate="novalidate">   <!-- Items processed should be sent back to process_order.php -->

<!----------------------------Displays the inputs from enquire....---------------------------->
<?php
    require_once "settings.php";

    $conn = @mysqli_connect(
        $host, $user, $pwd, $sql_db
    );
    
    session_start();

    if (isset($_POST['cardname'])){
      $cardnumber = $_POST["cardnumber"];
      $Card_Type = $_POST["Card_Type"];
      $cardexpiry = $_POST["cardexpiry"];
      $cvv = $_POST['cvv'];
      $_SESSION['cardname'] = $cardname;
      $_SESSION['cardnumber'] = $cardnumber;
      $_SESSION['cardexpiry'] = $cardexpiry;
      $_SESSION['cvv'] = $cvv;
    }
//----------------------------------------DISPLAYS ANY ERRORS IN THE PROGRAM-----------------------//
    $errMsg = $_SESSION["errMsg"];
    if (isset($_SESSION["errMsg"])){
        echo "<p>ERRORS FOUND!</p>";
    } else {
        echo "<p>ERRORS NOT FOUND!</p>";
    }

    if ($errMsg != ""){
        $count = count($_SESSION["errMsg"]);
        $i = 0;
    while ($i < $count){
        echo "<p>$errMsg[$i]</p>";
        $i ++;
        }
    } 
    
    if (isset($_SESSION['cardname'])){
      $cardnumber = $_SESSION["cardnumber"];
      $Card_Type = $_SESSION["Card_Type"];
      $cardexpiry = $_SESSION["cardexpiry"];
      $cvv = $_SESSION['cvv'];
    } else {
      echo "<p>Refill Card Payment!</p>";
    }

    // print_r($errMsg);

    // if ($givenname == null){
    //   echo "<p>not working</p>";
    // } else {
    //   echo "<p>working</p>";
    //   //echo ($givenname);
    // }
//-------------------------------------------------------------------------------------------------//
?>

  <fieldset>
    <legend>Purchase Details</legend>
      <span><label for="givenname">Given Name: </label>
        <input type="text" name="givenname" id="givenname"
        maxlength="25" placeholder="e.g John" />
      </span>
      <span><label for="familyname">Family Name: </label>
        <input type="text" name="familyname" id="familyname"
        maxlength="25" placeholder="e.g Smith" />
      </span>

      <p><label for="email">Email Address: </label>
        <input type="text" name="email" id="email" placeholder="e.g someone@outlook.com" />
      </p>

      <p><label for="phone">Phone Number: </label>
        <input type="tel" name="phone" id="phone" placeholder="0987-654-321" />
      </p>
    
    <div id="contactpref">
      <span><label for="e_mail">E-Mail </label>
        <input type="checkbox" name="contactpref" id="e_mail" value="E-Mail" />
      </span>
      <span><label for="post_mail">Post/Mail </label>
        <input type="checkbox" name="contactpref" id="post_mail" value="Post Mail" />
      </span>
      <span>
        <label for="mobile">Mobile Phone</label>
        <input type="checkbox" name="contactpref" id="mobile" value="Mobile" />
      </span>
    </div>

  </fieldset>
  
  <fieldset>
    <legend>Address</legend>
    <span><label for="street_address">Street Address</label>
      <input type="text" name="street_address" id="street_address"
      placeholder="e.g 123 Station St" maxlength="40" />
    </span>
    <span><label for="suburb">Suburb</label>
      <input type="text" name="suburb" id="suburb" placeholder="e.g St Kilda" />
    </span>

    <p>
      <label for="state">State: </label>
      <select name="state" id="state">
        <option value="">Please Select...</option>
        <option value="VIC" name="VIC" id="VIC">Victoria</option>
        <option value="NSW" name="NSW" id="NSW">New South Wales</option>
        <option value="QLD" name="QLD" id="QLD">Queensland</option>
        <option value="NT" name="NT" id="NT">Northern Territory</option>
        <option value="WA" name="WA" id="WA">Western Australia</option>
        <option value="SA" name="SA" id="SA">South Australia</option>
      </select>
    </p>

    <p>
      <label for="postcode">Postcode: </label>
      <input type="text" name="postcode" id="postcode" maxlength="4" />
    </p>
  </fieldset>

  <fieldset>
    <legend>Your Car Selection</legend>
    
      <p><label for="Selection_J">JDM</label>
        <select id="Selection_J" name="Selection_J">
          <option value="...">Please Select...</option>
          <option value="Toyota Supra" name="Toyota Supra" id="Toyota_Supra">Toyota Supra</option>
          <option value="Nissan Skyline" name="Nissan Skyline" id="Nissan_Skyline">Nissan Skyline</option>
          <option value="Mazda RX7" name="Mazda RX7" id="Mazda_RX7">Mazda RX7</option>
          <option value="Nissan Silvia" name="Nissan Silvia" id="Nissan_Silvia">Nissan Silvia</option>
          <option value="Honda S2000" name="Honda S2000" id="Honda_S2000">Honda S2000</option>
          <option value="Mazda RX8" name="Mazda RX8" id="Mazda_RX8" >Mazda RX8</option>
          <option value="No Selection" name="No Selection" id="No_Selection_J">No Selection</option>
        </select>
      </p>

      <p><label for="Selection_A">American</label>
        <select id="Selection_A" name="Selection_A">
          <option value="...">Please Select...</option>
          <option value="Ford Mustang" name="Ford Mustang" id="Ford_Mustang">Ford Mustang</option>
          <option value="Chevrolet Camaro" name="Chevrolet Camaro" id="Chevrolet_Camaro">Chevrolet Camaro</option>
          <option value="Cadillac CTS" name="Cadillac CTS" id="Cadillac_CTS">Cadillac CTS</option>
          <option value="Dodge Charger" name="Dodge Charger" id="Dodge_Charger">Dodge Charger</option>
          <option value="Dodge Viper" name="Dodge Viper" id="Dodge_Viper">Dodge Viper</option>
          <option value="Chevrolet Corvette" name="Chevrolet Corvette" id="Chevrolet_Corvette">Chevrolet Corvette</option>
          <option value="No Selection" name="No Selection" id="No_Selection_A">No Selection</option>
        </select>
      </p>
  </fieldset>

  <fieldset>
    <legend>Additional Enquiries</legend>
    <h2>Click on the Checkbox for any addons</h2>
    <table id="table_enquiry">
      <thead>
        <tr>
          <th>Car Addons/Modifications</th>
          <th>Price</th> 
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Automatic Transmission</td>
          <td>$1000</td>
        </tr>
        <tr>
          <td>Manual Transmission</td>
          <td>$550</td>
        </tr>
        <tr>
          <td>Spoilers</td>
          <td>$500</td>
        </tr>
        <tr>
          <td>Alloys</td>
          <td>$1100</td>
        </tr>
      </tbody>
    </table>

  <p id="requests">
    <span><label for="Automatic">Automatic: </label>
      <input type="checkbox" id="Automatic" name="requests" value="Automatic" /> </span>

    <span><label for="Manual">Manual: </label>
      <input type="checkbox" id="Manual" name="requests" value="Manual" /> </span>

    <span><label for="Spoiler">Spoiler: </label>
      <input type="checkbox" id="Spoiler" name="requests" value="Spoiler" /> </span>

    <span><label for="Alloy">Alloy: </label>
      <input type="checkbox" id="Alloy" name="requests" value="Alloy" /> </span>
  </p>

    <p><label for="quantity">Quantity:</label>
      <input type="text" id="quantity" name="quantity" value="quantity" placeholder="0-123123123124123" /></p>
  </fieldset>

  <fieldset>
    <legend>Preferred Date and Time for Test Drive/Pickup</legend>

      <p><label for="date">Date</label>
      <input type="text" name="date" id="date" placeholder="yyyy-mm-dd"
      pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" />
      </p>
      <p><label for="time">Time</label>
        <input type="time" id="time" />
      </p>
  </fieldset>

<!----------------------------Error Checks in PHP....---------------------------->

<?php
  //  require_once "settings.php";

  //  $conn = @mysqli_connect(
  //      $host, $user, $pwd, $sql_db
  //  );

  //  if (!$conn) {
  //      echo "<p>Invalid login details!";
  //  }
  //  else {
  //      $givenname = trim($_SESSION["givenname"]);
  //      $familyname = trim($_SESSION["familyname"]);
  //      $email = trim($_SESSION["email"]);
  //      $phone = trim($_SESSION["phone"]);
  //      $street_address = trim($_SESSION["street_address"]);
  //      $suburb = trim($_SESSION["suburb"]);
  //      $postcode = trim($_SESSION["postcode"]);
  //      $Selection_A = trim($_SESSION["Selection_A"]);
  //      $Selection_J = trim($_SESSION["Selection_J"]);
  //      $quantity = trim($_SESSION["quantity"]);
  //      $date = trim($_SESSION["date"]);
  //      $cost = trim($_SESSION["cost"]);

  //      $contactpref = trim($_SESSION["contactpref"]);
  //      $state = trim($_SESSION["state"]);
  //      $requests = trim($_SESSION["requests"]);

  //      $cardname = trim($_SESSION["cardname"]);
  //      $cardnumber= trim($_SESSION["cardnumber"]);
  //      $cardexpiry = trim($_SESSION["cardexpiry"]);
  //      $cvv = trim($_SESSION["cvv"]);
  //      $Card_Type = trim($_SESSION["Card_Type"]);
  //  }
  

  //  if (isset($_SESSION['cardname'])){
  //   $givenname = $_SESSION["givenname"];
  //   $familyname = $_SESSION["familyname"];
  //   $email = $_SESSION["email"];
  //   $phone = $_SESSION["phone"];
  //   $street_address = $_SESSION["street_address"];
  //   $suburb = $_SESSION["suburb"];
  //   $postcode = $_SESSION["postcode"];
  //   $Selection_A = $_SESSION["Selection_A"];
  //   $Selection_J = $_SESSION["Selection_J"];
  //   $quantity = $_SESSION["quantity"];
  //   $date = $_SESSION["date"];
  //   $cost = $_SESSION["cost"];

  //   $contactpref = $_SESSION["contactpref"];
  //   $state = $_SESSION["state"];
  //   $requests = $_SESSION["requests"];
  //  }

?>
<!--------------------------------------------------------------------------------->

    <br />
    
    <fieldset>
      <label for="Card_Type">Credit/Debit Card Type:</label>
      <select name="Card_Type" id="Card_Type" >
        <option value="">Please Select...</option>
        <option value="mastercard">Mastercard</option>
        <option value="visa">Visa</option>
        <option value="american_express">American Express</option>
      </select>

      <span><label for="cardname">Credit Card Name:</label>
        <input type="text" name="cardname" id="cardname" pattern="^[a-zA-Z ]{0,25}$" maxlength="40" placeholder="e.g John" />
      </span>
      
      <p>
      <span><label for="cardnumber">Card Number:</label>
        <input type="text" name="cardnumber" id="cardnumber" pattern="^[0-9]\d{15,16}$" maxlength="16" />
      </span>

      <span><label for="cardexpiry">Card Expiry Date:</label>
        <input type="text" name="cardexpiry" id="cardexpiry" pattern="^\d{2}\/\d{2}$" placeholder="yy/mm" />
      </span>
      </p>

      <span><label for="cvv">CVV - (Card Verification Value)</label>
        <input type="text" name="cvv" id="cvv" pattern="^d\{3,4}$" maxlength="4" />
      </span>

      <br />
      <input type="submit" id="checkout" value="Check-Out"/>
      <button type="button" id="cancelButton" value="cancel_order">Cancel Order</button>
    </fieldset> 
    
    <?php 
     //while ($i < count($_SESSION)){
       print_r($_SESSION);
       session_destroy();
        //$i = $i + 1;
     //}
    ?>

    <section>
        <footer class="footer_enq_prod">
        <strong> Exotic Customs.Pty </strong>
        <span> 101 Birmingham Ln, Toorak</span>
      </footer>
    </section>
    </form>

</body>
</html>
