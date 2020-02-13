<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="payment page of the website" />
    <meta name="author" content="Edeser III Monserrate, 102347754" />
    <meta name="keywords" content="payment, form, car purchase" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exotic Customs - Enquiries</title>
    <link href= "styles/style.css" rel="stylesheet" />
    <script src= "scripts/part2.js"></script>
  </head>
  <body id = "pmtpage">
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
    
    <form id="payment_form" method="post" action="process_order.php" novalidate="novalidate">
    
    <?php
      session_start();

      if (isset($_POST['givenname'])) {
        $givenname = $_POST["givenname"];
        $familyname = $_POST["familyname"];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $street_address = $_POST["street_address"];
        $suburb = $_POST["suburb"];
        $postcode = $_POST["postcode"];
        $quantity = $_POST["quantity"];
        $Selection_J = $_POST["Selection_J"];
        $Selection_A = $_POST["Selection_A"];
        $cost = $_POST["cost"];

        $contactpref = $_POST["contactpref"];
        $state = $_POST["state"];
        $requests = $_POST["requests"];
        $date = $_POST["date"];

         $_SESSION['givenname'] = $givenname;
         $_SESSION['familyname'] = $familyname;
         $_SESSION['email'] = $email;
         $_SESSION['phone'] = $phone;
         $_SESSION["street_address"] = $street_address;
         $_SESSION["suburb"] = $suburb;
         $_SESSION["postcode"] = $postcode;
         $_SESSION["Selection_J"] = $Selection_J;
         $_SESSION["Selection_A"] = $Selection_A;
         $_SESSION["quantity"] = $quantity;
         $_SESSION["date"] = $date;
         $_SESSION["cost"] = $cost;

         $_SESSION["contactpref"] = $contactpref;
         $_SESSION["state"] = $state;
         $_SESSION["requests"] = $requests;

        echo "<fieldset>
            <legend>Payment Details</legend>
            <h1>Prefilled Information...</h1>
            <p>Your Name: <span> $givenname $familyname </span> <br />
            Email: <span> $email </span> <br />
            Phone Number: <span> $phone </span> <br />
            Address: <span> $street_address </span> <br />
            State: <span> $state </span> <br />
            Postcode: <span> $postcode </span> <br />
            Suburb: <span> $suburb </span> <br />
            Contact Preference: <span> $contactpref </span> <br />
            Modification: <span> $requests </span> <br />
            Car Selection (Japanese): <span> $Selection_J </span> <br />
            Car Selection (American): <span> $Selection_A </span> <br />
            Quantity: <span> $quantity </span> <br />
            Date of Order: <span> $date </span> <br />
            Total Cost: <span> $cost </span> </p>
            </fieldset>";
      }
      else {
        echo "Data not sent correctly";
      }
    ?>

    <br />
    
    <input type="hidden" name="givenname" id="givenname" />
		<input type="hidden" name="familyname" id="familyname" />
		<input type="hidden" name="email" id="email" />
		<input type="hidden" name="phone" id="phone" />
		<input type="hidden" name="street_address" id="street_address" />
    <input type="hidden" name="postcode" id="postcode" />
    <input type="hidden" name="state" id="state" />
    <input type="hidden" name="suburb" id="suburb" />
    <input type="hidden" name="requests" id="requests" />
    <input type="hidden" name="contactpref" id="contactpref" />
    <input type="hidden" name="Selection_J" id="Selection_J" />
    <input type="hidden" name="Selection_A" id="Selection_A" />
    <input type="hidden" name="cost" id="cost" />
    <input type="hidden" name="quantity" id="quantity" />

    <fieldset>
      <label for="Card_Type">Credit/Debit Card Type:</label>
      <select name="Card_Type" id="Card_Type" >
        <option value="" name="Null" >Please Select...</option>
        <option value="Mastercard" name="Mastercard" >Mastercard</option>
        <option value="Visa" name="Visa" >Visa</option>
        <option value="American Express" name="American Express" >American Express</option>
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

      <?php
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

        //$_SESSION['cardname'] = $cardname;
        //$_SESSION['cardnumber'] = $cardnumber;
        //$_SESSION['cardexpiry'] = $cardexpiry;
        //$_SESSION['cvv'] = $cvv;
      ?>

      <input type="submit" id="checkout" value="Check-Out"/>
      <button type="button" id="cancelButton" value="cancel_order">Cancel Order</button>
    </fieldset> 
    </form>

    <section>
        <footer class="footer_enq_prod">
        <strong> Exotic Customs.Pty </strong>
        <span> 101 Birmingham Ln, Toorak</span>
      </footer>
    </section>
</body>
</html>
